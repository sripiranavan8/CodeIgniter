<?php
class Users extends CI_Controller
{
    public function register()
    {
        $data['title'] = "Sign Up";

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            $pass_enc = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $this->User_model->register($pass_enc);

            $this->session->set_flashdata('user_registered', 'You are now registered and can login');
            redirect('posts');
        }
    }
    public function login()
    {
        $data['title'] = "Sign In";

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user_id = $this->User_model->login($username, $password);
            if ($user_id == "not found") {
                $this->session->set_flashdata('login_failed', 'Login Failed!! Username not found!!');
                redirect('users/login');
            } elseif ($user_id == "not match") {
                $this->session->set_flashdata('login_failed', 'Login Failed!! Password is incorrect!!');
                redirect('users/login');
            } elseif ($user_id) {
                // Set session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                ); 
                $this->session->set_userdata($user_data);
                // set message
                $this->session->set_flashdata('login_success','You are now Login');
                redirect('posts');
            } else {
                $this->session->set_flashdata('login_failed', 'Login Failed');
                redirect('users/login');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('user_logout','You are logout');
        redirect('users/login');
    }

    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'That username is taken.Please choose another one');
        if ($this->User_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }
    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'That email is taken.Please choose another one');
        if ($this->User_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}
