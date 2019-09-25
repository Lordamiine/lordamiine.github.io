<?php session_start();
include 'utils.php';
check($_SESSION['email'],$_SESSION['passe']);
if($_SESSION['groupe']!="admin"){
header('location:index.php?cn=nogroupe');
}
 ?>

<?php 
//include 'utils.php';
$btn="ajouter";
extract($_POST);//$//nom
//pour ajouter
if(isset($_POST)  && isset($ok) && $ok=="ajouter" ){
//var_dump($_POST);
$infos=$_FILES['chemin'];
$chemin=charger($infos);
ajouter_document($titre,$dateml,$description,$chemin,$categorie_id);
header("location:document.php?add=ok");
//die("erreur");
}
extract($_GET);//$ids ou $ide
if(isset($ids)){
  supprimer($ids, "document");
 } 
 //si on veut editer (préparer la modif)
if (isset($ide)) {
  $ligne=recuperer_par_id($ide, "document");
$btn="modifier";
}

if (isset($ckpar)) {
foreach ($ckpar as $k => $v) {
 ajouter_partage_partenaire(date('Y-m-d H:i:s'),$document_id,$v);
}
}


if (isset($ckparg)) {
foreach ($ckparg as $k => $v) {
 ajouter_partage_groupe(date('Y-m-d H:i:s'),$document_ide,$v);
}
}

//si on veut modifier
if(isset($_POST) && isset($ok) && $ok=="modifier" ){
//extract($_POST);//$nom
//$infos=$_FILES['photo'];
//$chemin=charger($infos);
modifier_document($id, $titre,$dateml,$description,$chemin,$categorie_id);
header("location:document.php");
}

$produits=recuperer_tous("document");
extract($_GET);
if(isset($cid)){
$produits=recuperer_par("categorie_id=$cid", "document");


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

  <title>DOCUMENT</title>

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
  	<?php  include 'menu.php'; ?>

<!--Icon-->
 <section id="main-content">
        <h2 class="page-header" style="color: blue;"><i class="fa fa-laptop" style="color: black;"></i> Mes Documents </h2>

        <a type="button" class="btn btn-primary" href="deconnexion.php" style="margin-left: 660px";>Déconnexion</a>
</section>
<div style="border: solid 4px blue; margin-left: 179px;padding: 39px;">
<div class="container">
  <div class="col-md-12 center-zone" >
 <form class="form-horizontal" action="<?php echo basename(__FILE__) ?>" method="post" enctype="multipart/form-data" id="fadd">
<fieldset>

<!-- Form Name  //col-sm-8 -->
<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="titre">Titre:</label>  
  <div class="col-md-3">
  <input id="titre" name="titre" value="<?php if(isset($ligne)) echo $ligne['titre'] ?>" type="text" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  </div>

<!-- Text input-->

  <label class="col-md-3 control-label" for="dateml">Date:</label>  
  <div class="col-md-3">
  <input id="dateml" name="dateml" value="<?php if(isset($ligne)) echo $ligne['dateml'] ?>" type="date" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  
</div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="description">Déscription:</label>  
  <div class="col-md-3">
  <input id="description" name="description" value="<?php if(isset($ligne)) echo $ligne['description'] ?>" type="text" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  </div>



  <label class="col-md-3 control-label" for="chemin">Chemin:</label>  
  <div class="col-md-3">
  <input id="chemin" name="chemin" value="<?php if(isset($ligne)) echo $ligne['chemin'] ?>" type="file" placeholder="" class="form-control input-md" required="">
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="categorie_id">Catégorie:</label>  
  <div class="col-md-3">
  <select id="categorie_id" name="categorie_id" class="form-control input-md" required="">
<?php 
$categories=recuperer_tous("categorie");
 ?>
 <?php foreach ($categories as $c): ?>
   <option value="<?php echo $c['id'] ?>" <?php if(isset($ligne) && $c['id']==$ligne['categorie_id']) echo "selected"  ?>  ><?php echo $c['nom'] ?></option>

 <?php endforeach ?>
  </select>
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  </div>
<!-- Button -->

  <label class="col-md-3 control-label" for=""></label>
  <div class="col-md-3">
    <input style="height: 34px; width: 201px;" type="submit" class="btn btn-primary" name="ok" value="<?php echo $btn ?>">
  </div>
</div>
</fieldset>
</form>
</div>
<br>
<br>  
<br>
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
	<table class="tab table table-striped" style="width: 800px;">
            <thead>
              <tr>
                <th style="color: blue;">Code</th>
                <th style="color: blue;">Titre</th>
                <th style="color: blue;">Date</th>
                <th style="color: blue;">Déscription</th>
                <th style="color: blue;">Chemin</th>
                <th style="color: blue;">Catégorie</th>
                <th style="color: blue;">Actions</th>
              </tr>
            </thead>
            <tbody>

 <?php foreach ($produits as $p): ?>
 	 <tr>
                <td><?php echo $p['id'] ?></td>
                <td><?php echo $p['titre'] ?></td>
                <td><?php echo $p['dateml'] ?></td>
                <td><?php echo $p['description'] ?></td>
                <td><a target="_blank" href="<?php echo $p['chemin'] ?>">Visualiser</a></td>
                <td><?php 
$categorie=recuperer_par_id($p['categorie_id'], "categorie");

                echo $categorie['nom'] ?></td>
                
                

                <td><a onclick="return confirm('voulez vous vraiment supprimer cet élément?') "  href="document.php?ids=<?php echo $p['id'] ?>" class="btn btn-danger" >Supprimer</a>
                	<a href="document.php?ide=<?php echo $p['id'] ?>" class="btn btn-warning">modifier</a>

<!--modal partenaire-->
<button type="button" id="partagepartenaire" class="btn btn-primary" data-toggle="modal" data-target="#fatipr" onclick="$('#document_id').val(<?php echo $p['id'] ?>)">
  Partager Partenaire
</button>
<!-- Modal -->
<div class="modal fade" id="fatipr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="height: 400px;overflow: auto;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="height: 80%">
        
<div class="form-group">
  <label class="col-md-4 control-label" for="partenaire_id">Partenaire:</label>  
  <div class="col-md-4">
  
 
 <?php 
$par=recuperer_tous("partenaire");
 ?>
 <form action="document.php" method="post">
 <input type="hidden" name="document_id" id="document_id" >
 <ul>
 <?php foreach ($par as $c): ?>
  <li>
   <label><input name="ckpar[]" type="checkbox" value="<?php echo $c['id'] ?>"><?php echo $c['nom'] ?>
   </label>
  </li>
 <?php endforeach ?>
  </ul>
  <button>Partager</button>
</form>
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
  </div>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
      </div> 
    </div>
  </div>
</div>
                 
<!--fin modal partenaire-->


<!--model groupe-->
<button type="button" id="partagegroupe" class="btn btn-primary" data-toggle="modal" data-target="#fatigr" onclick="$('#document_ide').val(<?php echo $p['id'] ?>)">
  Partager Groupe
</button>

<!-- Modal -->
<div class="modal fade" id="fatigr" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="height: 400px;overflow: auto;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>  
      <div class="modal-body" style="height: 80%">

<!-- groupe -->
   <div class="form-group">
  <label class="col-md-4 control-label" for="groupe_id">Les Groupes:</label>  
  <div class="col-md-4">

 
 <?php 
$group=recuperer_tous("groupe_partenaire");
 ?>
 <form action="document.php" method="post">
 <input type="hidden" name="document_ide" id="document_ide" >
 <ul>
 <?php foreach ($group as $c): ?>

  <li>
  <label> <input name="ckparg[]" type="checkbox" value="<?php echo $c['id'] ?>"  ><?php echo $c['nom_groupe'] ?>
  </label>
  </li>
 <?php endforeach ?>
</ul>
 <button>Partager</button>
  <input type="hidden" name="id" value="<?php if(isset($ligne)) echo $ligne['id'] ?>">
    
  </div>
 </div>

<!-- fin groupe --> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--fin modal goupe-->

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
 $.post('<?php echo URL ?>'+'document.php', {titre: $('#mtitre').val(),dateml: $('#mdateml').val(),description: $('#mdescription').val(),chemin: $('#mchemin').val(),categorie_id: $('#categorie_id').val(),ok:'ajouter'}, function(data, textStatus, xhr) {
  alert("ajout effectué avec succès")
  location.reload();
 });

});

</script>
