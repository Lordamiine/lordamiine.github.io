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
</head>

<body>
 <!--menu-->

 <!--Fin menu-->
 
<!--login-->
 <div class = "container">
  <div class="wrapper">

    <?php extract($_GET); ?>
    
    <form action="verifier_session.php" method="post" name="Login_Form" class="form-signin">  
    <?php if (isset($cn) && $cn=='no'): ?>
      <div class="alert alert-danger" align="center">
      Login / passe invalide
    </div>
    <?php endif ?>
     <?php if (isset($cn) && $cn=='nogroupe'): ?>
      <div class="alert alert-danger" align="center">
    vous n'avez pas le droit d'accéder à cette page
    </div>
    <?php endif ?>     
        <h3 class="form-signin-heading">Espace admin</h3>
        <hr class="colorgraph"><br>
        
        <input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
        <input type="password" class="form-control" name="passe" placeholder="Mot de passe" required=""/>          
       
        <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Connexion</button>        
    </form>     
  </div>
</div>
<!--fin login-->

  <!-- javascripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
    

</body>

</html>
