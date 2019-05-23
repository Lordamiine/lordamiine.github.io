<?php 	
include_once '../utils.php';
extract($_POST);
sleep(3);
ajouter_contact($id,$name,$email,$subject,$message);
echo "ok";

 ?>