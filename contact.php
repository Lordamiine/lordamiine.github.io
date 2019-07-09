<?php 
 if(isset($_POST['submit'])){
 require 'phpmailer/PHPMailerAutolaod.php';
 


 $mail = new PHPMailer; // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "paganbr10@gmail.com";
$mail->Password = "helico@96";
$mail->SetFrom($_POST['email'],($_POST['name']));
$mail->AddAddress("paganbr10@gmail.com");
$mail->AddReplyTo($_POST['phone'],$_POST['email']);
$mail->Body =' <h1 class="align=center"> Nom :'.$_POST['name'].'<br>Télephone :'.$_POST['phone'].' Email :'.$_POST['email'].'<br> Message :'.$_POST['message']. '</h1>';


 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message envoyée avec succès";
 }


}

 ?>

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
    <h1 class="mt-4 mb-3">Page de contact
      
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Accueil</a>
      </li>
      <li class="breadcrumb-item active">Nous contacter</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <!-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.8021755692307!2d-7.51739578531299!3d33.610436948330914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cb984a7545bd%3A0xabd6e6cb3ef817c0!2sBacha+Air!5e0!3m2!1sfr!2sma!4v1559266542178!5m2!1sfr!2sma" width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0" allowfullscreen></iframe>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Nous contacter</h3>
        <p>
          hay Tarik Elkheir  
          <br> Al Qods rue 7 n°9
          <br>Sidi Bernoussi
          <br>Casablanca
        </p>
        <p>
          Télé : 05 22 75 71 92 / 05 22 73 03 16
        </p>
        <p>
          Email :
          <a href="commercialbacha2@gmail.com">commercialbacha2@gmail.com
          </a>
        </p>
        <p>
          <a href="https://www.facebook.com/" target="blank"><img src="img/fb.png" style="width: 40px; height: 40px;">Facebook</a>
        </p>
        <p>
          <a href="https://fr.linkedin.com/" target="blank"> <img src="img/link.png" style="width: 40px; height: 40px;">Linkedin</a> 
        </p>
        <p>
          <a href="https://www.youtube.com/" target="blank"> <img src="img/tube.png" style="width: 40px; height: 40px;">Youtube</a> 
        </p>
          <p>
          <a href="https://www.twitter.com/" target="blank"> <img src="img/twitter.png" style="width: 40px; height: 40px;">Twitter</a> 
        </p>
       
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Envoyer nous un message</h3>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group form-group">
            <div class="controls">
              <label>Nom :</label>
              <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Téléphone :</label>
              <input type="phone" class="form-control" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email :</label>
              <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
            </div>
            
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" id="submit" name="submit" class="btn btn-primary" value="send">Envoyer</button>
        </form>
      </div>

    </div>
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

</body>

</html>
