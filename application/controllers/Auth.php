<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __concstuct(){
        parent::__concstuct(); 
        if($_SESSION['user_logged'] == FALSE)
        {
            $this->session->set_flashdata("error","Please login first to view this page!");
            redirect("auth/login");
        }
    }

//////// login controler

public function login(){
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required|max_length[30]');
   if($this->form_validation->run()==TRUE){
   
    $username= $_POST['username'];
    $password=md5($_POST['password']);
    //check admin in database
   $this->db->select ('*');
   $this->db->from ('admin');
   $this->db->where(array('username'=>$username , 'password'=>$password));
   $query=$this->db->get();
   $admin=$query->row(); 
   //if admin exist
   if($admin->email){
       // temoporary message
       $this->session->set_flashdata("success","You are logged in");
       //set session variables
       $_SESSION['user_logged']=TRUE;
       $_SESSION["username"]=$admin->username;
   
       //redirect to profile page

       redirect("project/all","refresh");

    }
   else{
    $this->session->set_flashdata("error","No such account exists in database");
    // redirect to page to create account
    redirect("auth/login","refresh");
   }
   }   
  $this->load->view('includes/header');
  $this->load->view('auth/login');
   $this->load->view('includes/footer');
  
}

//////// logout controler
public function logout(){
    unset($_SESSION); 
    session_destroy();
    redirect("auth/login","refresh");
 }

//////// register controler
public function register()
{
    
    if(isset($_POST['register']))
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required|max_length[30]');
        $this->form_validation->set_rules('password','Confirm Password','required|max_length[30]|matches[password]');
   //if form validation true
        if($this->form_validation->run()==TRUE)
    {
     echo 'form validated';
      // add admin in db
     $data=array(
        'username'=>$_POST['username'],
        'password'=>md5($_POST['password']),
        'email'=>$_POST['email']            
     );
     $this->db->insert('admin',$data);
     $this->session->set_flashdata("success","Your account has been registered.You can login now");
     redirect("auth/login","refresh");
    }
}
  //load view

  $this->load->view('includes/header');
  $this->load->view('auth/register');
  $this->load->view('includes/footer');
 }
}