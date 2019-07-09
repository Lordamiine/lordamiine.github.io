<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Contact</title>

 
  <link rel="shortcut icon" type="image/x-icon" href="img/logooo.png" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <link href="css/modern-business.css" rel="stylesheet">

</head>
<body>

  <!-- Navigation -->
  <?php include'nav.php'; ?>
  <!-- Page Content -->
  <div class="container">
   
    <!-- Page Heading/Breadcrumbs -->
    

    <!-- Content Row -->
 

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
 <form id="couponWeb" name="couponWeb" method="POST" action="">
      <div><label for="nom">Nom</label><input type="text" name="nom" id="nom" value="" /></div>
      <div><label for="adresse">Adresse</label><input type="text" name="adresse" id="adresse" value="" /></div>
      <div><label for="cp">Code Postal</label><input type="text" name="cp" id="cp" value="" /></div>
      <div><label for="ville">Ville</label><input type="text" name="ville" id="ville" value="" /></div>
      <div><label for="email">Email</label><input type="text" name="email" id="email" value="" /></div>
      <div><label for="tel">Téléphone</label><input type="text" name="tel" id="tel" value="" /></div>
     
      <input type="submit" name="submit" id="print" value="print" class="button buttonPrint" onclick="imprimer_page();" />
 
      </form>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
  <script type="text/javascript"> function imprimer_page(){
  window.print();
}</script>

</body>

</html>
