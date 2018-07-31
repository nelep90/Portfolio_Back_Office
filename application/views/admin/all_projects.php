<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add new Project</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<h1>Admin Page:</h1>
        <?php if(isset($_SESSION['success'])){ ?>
            <div class="alert alert-success"><?php echo $_SESSION['success'];?>
        
        </div>
            <?php
           } ?> 
   HELLO , <?php echo $_SESSION['username'];?>
   <br><br>
   <a href="<?php echo base_url();?>index.php/auth/logout">Logout</a>
    <div class="col-md-12">
    <a href="<?php echo base_url();?>project/add">
 <span  type="button" class="btn btn-success"  class="bnt btn-success">Add project</span>
  </a>  
        <h1>Show all project</h1> 
        <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span 
        aria-hidden="true">*</span>
    </button>
    <strong></strong><?php echo $_SESSION['success'];?>
 </div> 

        <?php elseif (isset($_SESSION['error'])): ?>
        <div class="alert alert-error alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">*</span>
    </button>
    <strong></strong><?php echo $_SESSION['error'];?>
  </div> 
        
        <?php 
        else:?>

    <?php endif; ?>

     <form class="" method"POST"> 
        <div class="col-md-10 col-md-offset-1">
        <table class="table table-responsive table-bordered">
        <thead>
       <tr>
         <th>Project name</th>
         <th>Image</th>
         <th>Description</th>
         <th>Programing lng</th>
         <th>Techology</th>
         <th>Url</th>
         <th>Edit</th>
         <th>Delete</th>
       </tr>
  <?php 
  $i=0;
  foreach ($projects AS $project):?>
     <tr>
      <td><?php echo $project->project_name;?></td>
      <td><?php echo $project->image;?></td>
      <td><?php echo $project->description;?></td>
      <td><?php echo $project->programing_lng;?></td>
      <td><?php echo $project->techno;?></td>
      <td><?php echo $project->url;?></td>
      <td>
      <a href="<?php echo base_url();?>project/edit/<?php echo $project->project_id;?>">
      <span class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></span>
      </a>

    </td>
    <td>
      <a href="<?php echo base_url();?>project/delete_row/<?php echo $project->project_id;?>">
      <span class="btn btn-sm btn-primary"><i class="fa fa-trash"></i></span>
      </a>
      </td>
      
      </tr>
    <?php endforeach;?>
      </table>            
   
     </form>
        </div>
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>

</html>