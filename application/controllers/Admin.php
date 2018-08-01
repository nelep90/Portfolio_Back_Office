<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    //index main page
    public function index()
	{
        $this->load->view('includes/header');
        $this->load->view('auth/register');
        $this->load->view('includes/footer');   }  



  

    public function admin(){
        if($_SESSION['user_logged']==FALSE)
        {
            $this->session->set_flashdata("error","Please login first to view this page!");
            redirect("auth/login");
        }
        
    $this->load->view('admin/admin_page');
}

}



