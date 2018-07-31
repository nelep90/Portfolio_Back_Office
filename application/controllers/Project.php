<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

  //show all projects it works
 public function all(){
//Load model
       $this->load->model('Project_model');     
       $projects = $this->Project_model->get_all_projects();
       $data['projects']=$projects;
       $data["heading"]="List of projects";
       $data["title"]="View tutorial";
       $this->load->view('includes/header');
       $this->load->view('admin/all_projects', $data);
       $this->load->view('includes/footer');      
 }
// public function all(){
//   $this->load->model('Project_model');   
//   $projects = $this->Project_model->get_all_projects();
//   $this->load->view('admin/all_projects');
// }

public function profile($id)
{
//   // Load model
//   $this->load->model('User_model');
       
  //Get users from method
  $projects = $this->projects->getProfile($id);

  var_dump($projects);
   
}

  // add project
	public function add()
	{   
         if(isset($_POST['add'])){
         
          $this->load->model('Project_model');
        if($this->Project_model->add_project())
       {
        $this->session->set_flashdata('succes','Project Added Successfully');         
         redirect('project/all','refresh');
       }
       else{
         $this->session->set_flashdata('error','An Error occurred.Please try again later');         
         redirect('project/add','refresh');
           }
        }
         $this->load->view('includes/header');
        $this->load->view('admin/add_project');
         $this->load->view('includes/footer');       
  }
    
  // edit project
  public function edit($id)
  {
   $this->load->model('Project_model');

  
      if(isset($_POST['edit'])){
   if($this->Project_model->updateProject($id)){
     $this->session->set_flashdata('success','Product Updated Successfully');   
     redirect('project/all/'.$id, 'refresh');
     }
     else{
       $this->session->set_flashdata('error','An Error occurred.Please try again later');     
         redirect('project/edit/','refresh');
     }
   }
   $data['projects']=$this->Project_model->getProject($id); 
   $this->load->view('includes/header');
   $this->load->view('admin/edit_project',$data);
    $this->load->view('includes/footer');   
   
  }  

  /////// delete project  
  public function delete_row($id){
        
    $this->load->model('Project_model');
    $this->Project_model->deleteProject($id);
    redirect('project/all','refresh');
  }
}