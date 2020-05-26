<?php
class Post_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_posts($slug = FALSE, $limit, $offset)
    {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        if ($slug === FALSE) {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }
    public function create_post($post_image)
    {
        $slug = url_title($this->input->post('title'));
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category' => $this->input->post('category'),
            'post_image' => $post_image,
            'user_id' => $this->session->userdata('user_id')
        );
        return $this->db->insert('posts', $data);
    }
    public function delete_post($id)
    {
        $image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
        if ($image_file_name) {
            $cwd = getcwd();
            $image_file_path = $cwd . "/assets/images/posts/";
            chdir($image_file_path);
            unlink($image_file_name);
            chdir($cwd);
        }
        $this->db->where('post_id', $id);
        $this->db->delete('comments');
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }
    public function update_post()
    {
        $slug = url_title($this->input->post('title'));
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category' => $this->input->post('category')
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }
    public function get_categories()
    {
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    public function get_posts_by_category($id)
    {
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category');
        $query = $this->db->get_where('posts', array('category' => $id));
        return $query->result_array();
    }
}
