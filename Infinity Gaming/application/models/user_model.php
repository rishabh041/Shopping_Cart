
<?php
class User_Model extends CI_Model{

   public function register()
   {
     $data=array(
       'first_name'  => $this->input->post('first_name'),
       'last_name'  => $this->input->post('last_name'),
       'email'  => $this->input->post('email'),
       'username'  => $this->input->post('username'),
       'password'  => md5($this->input->post('password'))

     );
     $insert=$this->db->insert('users',$data);
     return $insert;
   }
   public function login($username,$password)
   {
     //$result=$this->db->query("SELECT * FROM `users` WHERE `username`=$username AND `password`=$password ");
     //$this->db->where('username',$username);
     //$this->db->where('password',$password);
     //$result=$this->db->get('users');
     $this->db->select('id');
     $this->db->from('users');
     $this->db->where('username',$username);
     $this->db->where('password',$password);
     $result=$this->db->get();
     if($result->num_rows() == 1)
      return $result->row(0)->id;
      else {
        return false;
      }
   }
}
 ?>
