<?php
class Project_model extends CI_Model
{
    // //show all projects it works
      public function get_all_projects(){
     
        $query ="SELECT * FROM projects";
        $resultset = $this->db->query($query);
         $projects = $resultset->result();
         return $projects;
         }
    


        public function getProfile($id)
        {
            // this load database
            $this->load->database();
    
            $query="SELECT * from projects Where user_id=". $id;
           $resultset = $this->db->query($query);
    
           return $resultset->row();
    
           //row() for signle row
           //result() for multiple rows
        }
  // add project
    public function add_project()
    { 
              $data = array(
        'project_name'=>$this->input->post('project_name'),
         'description'=>$this->input->post('description'),
         'image'=>$this->input->post('image'),
         'programing_lng'=>$this->input->post('programing_lng'),
         'techno'=>$this->input->post('techno'),
         'url'=>$this->input->post('url'),
         'url_git'=>$this->input->post('url_git')
         );  
         $this->db->insert('projects', $data); 
        //  $id=$this->db->insert_id();
         return true;
    }
    /// edit project
    public function getProject($id)
    {
        $this->db->select('*');
        $this->db->where('project_id',$id);
        $this->db->from('projects');
        $query=$this->db->get();
        return $query->row();

    }
    // update project
    public function updateProject($id){     
        $data = array(
        'project_name'=>$this->input->post('project_name'),
        'description'=>$this->input->post('description'),
        'image'=>$this->input->post('image'),
        'programing_lng'=>$this->input->post('programing_lng'),
        'techno'=>$this->input->post('techno'),
        'url'=>$this->input->post('url'),
        'url_git'=>$this->input->post('url_git')
        );  
        $this->db->where('project_id',$id); 
        $this->db->update('projects',$data);
        return $id;
    }
     
    // delete project
    public function deleteProject($id)
    {
    $this->db->where('project_id',$id);
    $this->db->delete('projects');
    }   
}