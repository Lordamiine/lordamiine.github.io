<?php session_start();
include 'utils.php';
check($_SESSION['email'],$_SESSION['passe']);
if($_SESSION['groupe']!="prof"){
header('location:login.php?cn=nogroupe');
} ?>

<?php 

$mesdocs=recuperer_doc_partage($_SESSION['id']);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>mes documents</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/datatables.css">
  </head>
  <body>
  	<?php  include 'menu2.php'; ?>
	
	<section id="main-content">
        <h2 class="page-header" style="color: blue;">
          <a type="button" class="btn btn-primary" href="deconnexion.php" style="margin-left: 664px";>Déconnexion</a>
        <i class="fa fa-laptop" style="color: black;"></i> Mes documents</h2>
</section>

 <div class="container">
  <div class="col-md-8 col-sm-8 center-zone" >
 <form class="form-horizontal" action="<?php echo basename(__FILE__) ?>" method="post" enctype="multipart/form-data" id="fadd">
<fieldset>
<!-- Button -->
</fieldset>
</form>
</div>
</div>
<div class="container">
  <div class="container">
    <div class="container">
      <div class="container">
        <div class="container">
          <div class="container">
            <div class="container">
              <div class="container">
<div class="container">
<div class="container">
<div class="container">
  <table class="tab table table-striped" style="width: 800px;">
            <thead>
              <tr>
               
                <th style="color: blue;">Date de partage</th>  
                 <th  style="color: blue;">Titre</th>              
                <th  style="color: blue;">Déscription</th>
                <th  style="color: blue;">Document</th>
              </tr>
            </thead>
            <tbody>

<?php foreach ($mesdocs as $v): ?>
   <tr>
                <th><?php echo $v['date_partage']; ?></th>
                <th><?php echo $v['titre']; ?></th>                
                <th><?php echo $v['description']; ?></th>

                <th><a href="<?php echo $v['chemin']; ?>">Visualiser</a></th>
              </tr>
<?php endforeach ?>

            </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php if ($_SESSION['groupe']=='admin'): ?>
	 config 
<?php endif ?>
 <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
<script type="text/javascript" src="js/datatables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.tab').DataTable();
      });
    </script>


</body>

</html>
