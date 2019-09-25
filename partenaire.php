<?php 
include 'utils.php';
$btn="ajouter";
extract($_POST);
//pour ajouter
if(isset($_POST) && isset($ok) && $ok=="ajouter" ){
//extract($_POST);//$nom
//$infos=$_FILES['photo'];
//$chemin=charger($infos);
ajouter_partenaire($nom,$prenom,$passe,$email,$groupe);
header("location:partenaire.php");
}
extract($_GET);//$ids ou $ide
if(isset($ids)){
  supprimer($ids, "partenaire");
 } 
 //si on veut editer (préparer la modif)
if (isset($ide)) {
  $ligne=recuperer_par_id($ide, "partenaire");
$btn="modifier";
}

//si on veut modifier
if(isset($_POST) && isset($ok) && $ok=="modifier" ){
//extract($_POST);//$nom
//$infos=$_FILES['photo'];
//$chemin=charger($infos);
modifier_partenaire($id, $nom,$prenom,$passe,$email,$groupe);
header("location:partenaire.php");
}

$produits=recuperer_tous("partenaire");
extract($_GET);
if(isset($cid)){
$produits=recuperer_par("groupe=$cid", "partenaire");


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

  <title>La Gestion Eléctronique des documents</title>

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

<!--Icon-->
 <section id="main-content">
        <h2 class="page-header" style="color: blue;"><i class="fa fa-file-text-o" style="color: black;"></i>Partenaire</h2>
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
        <h5 class="modal-title" id="exampleModalLabel">Le Nom de Partenaire</h5>
        
      </div>
      <div class="modal-body">
       <div class="form-group">
  <label class="col-md-4 control-label" for="nom">Nom:</label>  
  <div class="col-md-4">
  <input id="mnom" name="nom" value="<?php if(isset($ligne)) echo $ligne['nom'] ?>" type="text" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
</div> 
</div>
</div>


<div class="modal-body">
<div class="form-group">
  <label class="col-md-4 control-label" for="prenom">Prénom:</label>  
  <div class="col-md-4">
  <input id="mprenom" name="prenom" value="<?php if(isset($ligne)) echo $ligne['prenom'] ?>" type="text" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
</div>
</div>
</div> 
 

 <div class="modal-body">
      <div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail:</label>  
  <div class="col-md-4">
  <input id="memail" name="email" value="<?php if(isset($ligne)) echo $ligne['email'] ?>" type="text" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
</div>
</div>
</div>  

<div class="modal-body">
      <div class="form-group">
  <label class="col-md-4 control-label" for="passe">Passe:</label>  
  <div class="col-md-4">
  <input id="mpasse" name="passe" value="<?php if(isset($ligne)) echo $ligne['passe'] ?>" type="text" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
</div>
</div>
</div> 

 <div class="modal-body">
      <div class="form-group">
  <label class="col-md-4 control-label" for="groupe">Groupe:</label>  
  <div class="col-md-4">
  <input id="mgroupe" name="groupe" value="<?php if(isset($ligne)) echo $ligne['groupe'] ?>" type="text" placeholder="" class="form-control input-md" required="">
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


 <div class="container" id="main-content">
  <div class="col-md-8 col-sm-8 center-zone" >
 <form class="form-horizontal" action="<?php echo basename(__FILE__) ?>" method="post" enctype="multipart/form-data" id="fadd">

</form>
</div>

  
<div class="col-sm-4">
  <img src="<?php echo $ligne['photo'] ?>" alt="" class="img-responsive">
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
  <table class="tab table table-striped" style="    width: 789px;">
            <thead>
              <tr>
                <th style="color: blue;">Code</th>
                <th style="color: blue;">Nom</th>
                <th style="color: blue;">Prénom</th>
                <th style="color: blue;">E-mail</th>
                <th style="color: blue;">Passe</th>
                <th style="color: blue;">Groupe</th>
                <th style="color: blue;">Actions</th>
              </tr>
            </thead>
            <tbody>

 <?php foreach ($produits as $p): ?>
   <tr>
                <td><?php echo $p['id'] ?></td>
                <td><?php echo $p['nom'] ?></td>
                <td><?php echo $p['prenom'] ?></td>
                <td><?php echo $p['email'] ?></td>
                <td><?php echo $p['passe'] ?></td> 
                <td><?php echo $p['groupe'] ?></td>

                <td><a onclick="return confirm('voulez vous vraiment supprimer cet élément?') "  href="partenaire.php?ids=<?php echo $p['id'] ?>" class="btn btn-danger" >Supprimer</a>
                  <a href="partenaire.php?ide=<?php echo $p['id'] ?>" class="btn btn-warning">modifier</a>


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
 <?php //include_once 'document.php' ;?>

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
 $.post('<?php echo URL ?>'+'partenaire.php', {nom: $('#mnom').val(),prenom: $('#mprenom').val(),passe: $('#mpasse').val(),email: $('#memail').val(),groupe: $('#mgroupe').val(),ok:'ajouter'}, function(data, textStatus, xhr) {
  alert("ajout effectué avec succès")
  location.reload();
 });


});

</script>