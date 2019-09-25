<?php 
include 'utils.php';
$btn="ajouter";
extract($_POST);
//pour ajouter
if(isset($_POST) && isset($ok) && $ok=="ajouter" ){
//extract($_POST);//$nom
//$infos=$_FILES['photo'];
//$chemin=charger($infos);
ajouter_groupe($nom_groupe);
header("location:group.php");
}
extract($_GET);//$ids ou $ide
if(isset($ids)){
  supprimer($ids, "groupe_partenaire");
 } 
 //si on veut editer (préparer la modif)
if (isset($ide)) {
  $ligne=recuperer_par_id($ide, "groupe_partenaire");
$btn="modifier";
}

//si on veut modifier
if(isset($_POST) && isset($ok) && $ok=="modifier" ){
//extract($_POST);//$nom
//$infos=$_FILES['photo'];
//$chemin=charger($infos);
modifier_groupe($id, $nom_groupe);
header("location:group.php");
}

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

  <title>GROUPE</title>

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

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
     <link rel="stylesheet" type="text/css" href="css/datatables.css">
</head>

<body>
 <!--menu-->
<?php include_once 'menu.php' ;?>
 <!--Fin menu-->

  <section id="main-content">
        <h2 class="page-header" style="color: blue;"><i class="fa fa-list-alt" style="color: black;"></i> Groupe </h2>
</section>

<!-- Button trigger modal -->
 <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fati" style="margin-left: 673px">
  Nouveau
</button>
<!-- Modal -->
<div class="modal fade" id="fati" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Le Nom De Groupe</h5>
        
      </div>
      <div class="modal-body">
        <div class="form-group">
  <label class="col-md-4 control-label" for="nom_groupe">Nom:</label>  
  <div class="col-md-4">
  <input id="mnom_groupe" name="nom_groupe" value="<?php if(isset($ligne)) echo $ligne['nom_groupe'] ?>" type="text" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
   </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
       <input  type="submit" id="add"   class="btn btn-primary" name="ok" value="<?php echo $btn ?>">
      </div>
    </div>
  </div>
</div>
 
 <div class="container">
  <div class="col-md-8 col-sm-8 center-zone" >
 <form class="form-horizontal" action="<?php echo basename(__FILE__) ?>" method="post" enctype="multipart/form-data" id="fadd">
<fieldset>

<!-- Form Name -->
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
  <table class="tab table table-striped" style="width: 803px;">
            <thead>
              <tr>
                <th style="color: blue;">Code</th>
                <th style="color: blue;">Nom</th>                
                <th style="color: blue;">Actions</th>
              </tr>
            </thead>
            <tbody>
<?php 
  $categories=recuperer_tous( "groupe_partenaire");
 ?>

 <?php foreach ($categories as $c): ?>
   <tr>
                <td><?php echo $c['id'] ?></td>
                <td><?php echo $c['nom_groupe'] ?></td>

                <td><a onclick="return confirm('voulez vous vraiment supprimer cet élément?') " href="group.php?ids=<?php echo $c['id'] ?>" class="btn btn-danger">Supprimer</a>
                  
                  <a href="group.php?ide=<?php echo $c['id'] ?>" class="btn btn-warning">Modifier</a>

                  <a href="partenaire.php?cid=<?php echo $c['id'] ?>" class="btn btn-info">Afficher les partenaire</a>


                </td>
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
</div>



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
<script type="text/javascript">
$(document).on('click', '#add', function(event) {
  event.preventDefault();
 $.post('<?php echo URL ?>'+'group.php', {nom_groupe: $('#mnom_groupe').val(),ok:'ajouter'}, function(data, textStatus, xhr) {
  alert("ajout effectué avec succès")
  location.reload();
 });


});

</script>