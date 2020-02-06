<?php 
class User_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    public function register($pass)
    {
        //user data
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $pass,
            'zipcode' => $this->input->post('zipcode')
        );
        return $this->db->insert('users',$data);
    }
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users',array('username'=>$username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
        
    }
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users',array('email'=>$email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
        
    }
    public function login($username,$password)
    {
        $this->db->where('username',$username);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            if (password_verify($password,$result->row(0)->password)) {
                return $result->row(0)->id;
            }else{
                return 'not match';
            }
        } else {
            return 'not found';
        }
        
    }
}