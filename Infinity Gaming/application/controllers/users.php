<?php
class Users extends CI_Controller{
  public function register()
  {
    //validation rules
    //trim for removing extra whiespaces
      $this->form_validation->set_rules('first_name','First Name','required|trim');
			$this->form_validation->set_rules('last_name','Last Name','required|trim');
			$this->form_validation->set_rules('username','User Name','required|trim');
			$this->form_validation->set_rules('email','Email Address','required|valid_email|trim');
			$this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');
      if ($this->form_validation->run() == FALSE)
               {
                 $data['main_content']='register';
                 $this->load->view('layouts/main',$data);
               }
               else
               {
                 if($this->User_Model->register()){
                   $this->session->set_flashdata('registered','You are now registered and you can now Login!');
                   redirect('products');
                 }

               }

  }
  public function login()
  {
    //validation rule for login
    $this->form_validation->set_rules('email','Email Address','required|valid_email|trim');
    $this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[50]');
    $username=$this->input->post('username');
    $password=md5($this->input->post('password'));
    $user_id=$this->User_Model->login($username,$password);
             if ($user_id)
             {
               $data=array(
                 'user_id' => $user_id,
                 'username' => $username,
                 'logged_in' =>'true'
               );
               //store user data in a session
               $this->session->set_userdata($data);

               //set message in a session
               $this->session->set_flashdata('pass_login', 'You are now logged in');
               redirect('products');
             }
             else
             {
               $this->session->set_flashdata('fail_login', 'Sorry,Incorrect Login Info');
               redirect('products');

             }

  }
  public function logout()
  {
    //unset all user data
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');
    $this->session->sess_destroy();

    redirect('products');


  }
}
