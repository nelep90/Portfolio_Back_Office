<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add new Project</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="col-md-12">
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
    <div class="col-md-12">
        <h1>Add new project</h1>   
     <form action="" method="post"> 
        <div class="col-md-10 col-md-offset-1">
            
            <div class="form-group">
                <label>Project Name</label>
                <input class="form-control" name="project_name" placeholder="Enter your project name">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"> </textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input class="form-control" name="image" placeholder="Image">
            </div>

            <div class="form-group">
                <label>Programig language</label>
                <input class="form-control" name="programing_lng" placeholder="Programing_lng">
            </div>


            <div class="form-group">
                <label>Technology</label>
                <input class="form-control" name="techno" placeholder="Technology">
            </div>

            <div class="form-group">
                <label>Url</label>
                <input class="form-control" name="url" placeholder="Url">
            </div>
            <a href="<?php echo base_url();?>project/all">
            <button  class="bnt btn-success" name="add">Add new projcet</button>
            </a> 
        </div>
        </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>

</html>