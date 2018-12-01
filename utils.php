
<?php 

function connecter_db()
{
	$cnx= new PDO("mysql:host=localhost;dbname=parc_gaza","root","");
 $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
 return $cnx;
}

function ajouter_contact($id,$name,$email,$subject,$message)
{ 
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into contact(id,name,email,subject,message) values(?,?,?,?,?)");
	$rp->execute(array($id,$name,$email,$subject,$message));
}
 	 ?>