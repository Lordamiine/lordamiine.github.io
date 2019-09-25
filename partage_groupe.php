<?php 
include 'utils.php';
$btn="ajouter";
extract($_POST);
//pour ajouter
if(isset($_POST) && isset($ok) && $ok=="ajouter" ){
//extract($_POST);//$nom
//$infos=$_FILES['photo'];
//$chemin=charger($infos);
ajouter_partage_groupe($date_partage,$document_id,$groupe_id);
header("location:partage_groupe.php");
}
extract($_GET);//$ids ou $ide
if(isset($ids)){
  supprimer($ids, "partage_groupe");
 } 
 //si on veut editer (préparer la modif)
if (isset($ide)) {
  $ligne=recuperer_par_id($ide, "partage_groupe");
$btn="modifier";
}

//si on veut modifier
if(isset($_POST) && isset($ok) && $ok=="modifier" ){
//extract($_POST);//$nom
//$infos=$_FILES['photo'];
//$chemin=charger($infos);
modifier_partage_groupe($id,$date_partage,$document_id,$groupe_id);
header("location:partage_groupe.php");
}

$produits=recuperer_tous("partage_groupe");
extract($_GET);
if(isset($cid)){
$produits=recuperer_par("document_id=$cid", "partage_groupe");
}

$produits=recuperer_tous("partage_groupe");
extract($_GET);
if(isset($cid)){
$produits=recuperer_par("groupe_id=$cid", "partage_groupe");


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

  <title>PARTAGE GROUPE</title>

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
        <h2 class="page-header" style="color: blue;"><i class="fa fa-table" style="color: black;"></i>Partage Groupe</h2>
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
        <h5 class="modal-title" id="exampleModalLabel">Partage Groupe</h5>
        
      </div>
      <div class="modal-body">
        <!-- Text input-->
        <div class="form-group">
  <label class="col-md-4 control-label" for="date_partage">Date Partage:</label>  
  <div class="col-md-4">
  <input id="mdate_partage" name="date_partage" value="<?php if(isset($ligne)) echo $ligne['date_partage'] ?>" type="date" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
   </div>
</div>
  </div>  
    <!-- Text input-->
    <div class="modal-body">
<div class="form-group">
  <label class="col-md-4 control-label" for="document_id">Document:</label>  
  <div class="col-md-4">
  <select id="document_id" name="document_id" class="form-control input-md" required="">
 
 <?php 
$doc=recuperer_tous("document");
 ?>
 <?php foreach ($doc as $c): ?>
   <option value="<?php echo $c['id'] ?>" <?php if(isset($ligne) && $c['id']==$ligne['document_id']) echo "selected"  ?>  ><?php echo $c['titre'] ?></option>

 <?php endforeach ?>
  </select>

  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  </div>
</div>
<br>
<!-- Text input-->
<div class="modal-body">
<div class="form-group">
  <label class="col-md-4 control-label" for="groupe_id">Groupe:</label>  
  <div class="col-md-4">
  <select id="groupe_id" name="groupe_id" class="form-control input-md" required="">
 
 <?php 
$group=recuperer_tous("groupe_partenaire");
 ?>
 <?php foreach ($group as $c): ?>
   <option value="<?php echo $c['id'] ?>" <?php if(isset($ligne) && $c['id']==$ligne['groupe_id']) echo "selected"  ?>  ><?php echo $c['nom_groupe'] ?></option>

 <?php endforeach ?>
  </select>

  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  </div>
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
</div>

 <div class="container">
  <div class="col-md-8 col-sm-8 center-zone" >
 <form class="form-horizontal" action="<?php echo basename(__FILE__) ?>" method="post" enctype="multipart/form-data" id="fadd">

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
                <th style="color: blue;">id</th>
                <th style="color: blue;">Date partage</th>
                <th style="color: blue;">Titre de document</th>
                <th style="color: blue;">Nom du Groupe</th>
                <th style="color: blue;">Actions</th>
              </tr>
            </thead>
            <tbody>
<?php 
  $categories=recuperer_tous( "partage_groupe");
 ?>

 <?php foreach ($categories as $c): ?>
   <tr>
                <td><?php echo $c['id'] ?></td>
                <td><?php echo $c['date_partage'] ?></td>
                <td><?php $document=recuperer_par_id($c['document_id'], "document"); echo $document['titre'] ?></td>
                <td><?php $group=recuperer_par_id($c['groupe_id'], "groupe_partenaire"); echo $group['nom_groupe'] ?></td>
                

                <td><a onclick="return confirm('voulez vous vraiment supprimer cet élément?') " href="partage_groupe.php?ids=<?php echo $c['id'] ?>" class="btn btn-danger">Supprimer</a>
                  <a href="partage_groupe.php?ide=<?php echo $c['id'] ?>" class="btn btn-warning">modifier</a>
                  
                   
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
 $.post('<?php echo URL ?>'+'partage_groupe.php', {date_partage: $('#mdate_partage').val(),document_id: $('#document_id').val(), groupe_id: $('#groupe_id').val(),ok:'ajouter'}, function(data, textStatus, xhr) {
  alert("ajout effectué avec succès")
  location.reload();
 });


});

</script>
