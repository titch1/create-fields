<?php
    class User_model extends CI_Model{
       public function register($enc_password){

    //user data array
    $data = array(

   'name' => $this->input->post('name'),
   'email' => $this->input->post('email'),
   'username' => $this->input->post('username'),
   'password' => $enc_password,
   'zipcode' => $this->input->post('zipcode')


);

//insert user

return $this->db->insert('user', $data);



  }
  //log user in
  public function login($username, $password){

//validate
  $this->db->where('username', $username);
$this->db->where('password', $password);

$result = $this->db->get('user');

if($result->num_rows()== 1){

      return $result->row(0)->id;
}else{

  return false;

   }


}

  //check username exists
  public function check_username_exists($username){

  	$query = $this->db->get_where('user', array('username'=>$username));

  	if(empty($query->row_array())){
  		return true;
  	}else{

  		return false;
  	  }

  	}

   //check email exists
  public function check_email_exists($email){

  	$query = $this->db->get_where('user', array('email'=>$email));

  	if(empty($query->row_array())){
  		return true;
  	}else{

  		return false;
  	}
  }


}