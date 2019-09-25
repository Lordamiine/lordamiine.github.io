<?php 
define('URL','http://localhost:82/la gestion electronique des documents/');
function connecter_db()
{
	$cnx= new PDO("mysql:host=localhost;dbname=ged","root","");
 $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
 return $cnx;
}
//ajout de document
function ajouter_document($titre,$dateml,$description,$chemin,$categorie_id)
{ try{
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into document (titre,dateml,description,chemin,categorie_id) values(?,?,?,?,?)");
	$rp->execute(array($titre,$dateml,$description,$chemin,$categorie_id));
}catch(PDOException $e){
die("erreur ajout document ".$e->getMessage());
}
	
}


//ajout de categorie
function ajouter_categorie($nom)
{ 
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into categorie (nom) values(?)");
	$rp->execute(array($nom));
}


//suppression dans une table par son id
function supprimer($id,$table)
{
	try{
	$cnx=connecter_db();
	$rp=$cnx->prepare("delete from $table where id=?");
	$rp->execute(array($id));
	}
	catch(PDOException $error){
die("erreur de suppression ".$error->getMessage());
	}

}


//modification de document
function modifier_document($id,$new_titre,$new_dateml,$new_description,$new_chemin,$categorie_id)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("update document set titre = ? , dateml= ? , description=? , chemin=? , categorie_id=? where id=?");
	$rp->execute(array($new_titre,$new_dateml,$new_description,$new_chemin,$categorie_id,$id));
}


//modification de categorie
function modifier_categorie($id,$new_nom)
{ try{
	$cnx=connecter_db();
	$rp=$cnx->prepare("update categorie set nom = ?   where id=?");
	$rp->execute(array($new_nom,$id));
}catch(PDOException $error){
die("erreur de modif cate ".$error->getMessage());
	}}


//recuperation de tous les documents
function recuperer_tous( $table)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from $table order by id desc");
	$rp->execute(array());
	$data=$rp->fetchAll();
	return $data;
}


//recuperation de tous les documents
function recuperer_par( $condition,$table)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from $table where $condition");
	$rp->execute(array());
	$data=$rp->fetchAll();
	return $data;
}


//recuperation d'une table par son id
function recuperer_par_id($id,$table )
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("select * from $table where id = ?");
	$rp->execute(array($id));
	$data=$rp->fetch();
	return $data;
}


//ajout de partenaire
function ajouter_partenaire($nom,$prenom,$passe,$email,$groupe)
{ 
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into partenaire (nom,prenom,passe,email,groupe) values(?,?,?,?,?)");
	$rp->execute(array($nom,$prenom,$passe,$email,$groupe));
}


//modification de partenaire
function modifier_partenaire($id,$new_nom,$new_prenom,$new_passe,$new_email,$new_groupe)
{ try{
	$cnx=connecter_db();
	$rp=$cnx->prepare("update partenaire set nom = ?, prenom=?, passe=?, email=?, groupe=?  where id=?");
	$rp->execute(array($new_nom,$new_prenom,$new_passe,$new_email,$new_groupe,$id));
}catch(PDOException $error){
die("erreur de modif cate ".$error->getMessage());
	}}


//ajout groupe_partenaire
function ajouter_groupe($nom_groupe)
{ 
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into groupe_partenaire (nom_groupe) values(?)");
	$rp->execute(array($nom_groupe));
}


//modification groupe_partenaire
function modifier_groupe($id,$new_nom_groupe)
{ try{
	$cnx=connecter_db();
	$rp=$cnx->prepare("update groupe_partenaire set nom_groupe = ? where id=?");
	$rp->execute(array($new_nom_groupe,$id));
}catch(PDOException $error){
die("erreur de modif cate ".$error->getMessage());
	}}



//ajout de partage_partenaire
function ajouter_partage_partenaire($date_partage,$document_id,$partenaire_id)
{ 
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into partage_partenaire (date_partage,document_id,partenaire_id) values(?,?,?)");
	$rp->execute(array($date_partage,$document_id,$partenaire_id));
}


//modification de partage_partenaire
function modifier_partage_partenaire($id,$new_date_partage,$new_document_id,$new_partenaire_id)
{ try{
	$cnx=connecter_db();
	$rp=$cnx->prepare("update partage_partenaire set date_partage = ?, document_id=?, partenaire_id=?  where id=?");
	$rp->execute(array($new_date_partage,$new_document_id,$new_partenaire_id,$id));
}catch(PDOException $error){
die("erreur de modif cate ".$error->getMessage());
	}}


//ajout de partage_groupe
function ajouter_partage_groupe($date_partage,$document_id,$groupe_id)
{ 
	$cnx=connecter_db();
	$rp=$cnx->prepare("insert into partage_groupe (date_partage,document_id,groupe_id) values(?,?,?)");
	$rp->execute(array($date_partage,$document_id,$groupe_id));
}


//modification de partage_groupe
function modifier_partage_groupe($id,$new_date_partage,$new_document_id,$new_groupe_id)
{ try{
	$cnx=connecter_db();
	$rp=$cnx->prepare("update partage_groupe set date_partage = ?, document_id=?, groupe_id=?  where id=?");
	$rp->execute(array($new_date_partage,$new_document_id,$new_groupe_id,$id));
}catch(PDOException $error){
die("erreur de modif cate ".$error->getMessage());
	}}




function charger($infos)
{
	extract($infos);//$name,$tmp_name,...(5 infos)
	//generer un nom aléatoire et unique
	$new_name=md5("test".date('Y_m_d_h_i_s')."_".rand(0,99))."_".$name;
	//deplacer le fichier temp vers sa destination  définitive
	$new_destination="uploads/".$new_name;
	$extension=pathinfo($name,PATHINFO_EXTENSION);
//taille en octect
$taille=filesize($tmp_name);

if($taille > 80000000){
die("fichier trop volumineux ,  la taille max est 80Mo");
}
$extension_autorise=array('jpg','png','jpeg','gif','pdf');
if (! in_array(strtolower($extension), $extension_autorise)) {
	die("type de fichier non autorisé (ce n'est une image)");
}
	move_uploaded_file($tmp_name, $new_destination);
return  $new_destination;
}


function get_count($table,$condition)
{
	$cnx=connecter_db();
	$rp=$cnx->prepare("select count(*) as nombre from $table where $condition");
	$rp->execute(array());
	$data=$rp->fetch();
	return $data['nombre'];
}
function check($email,$passe){

$cnx=connecter_db();
$rp=$cnx->prepare("select * from  partenaire where email=? and passe =?
	");
$rp->execute(array($email,$passe));
$data=$rp->fetch();
if(empty($data)){
header("location:index.php?cn=no");
die();
}else {

session_regenerate_id();
$_SESSION['id']=$data['id'];
$_SESSION['email']=$data['email'];
$_SESSION['passe']=$data['passe'];
$_SESSION['groupe']=$data['groupe'];
$_SESSION['nom']=$data['nom'];
$_SESSION['prenom']=$data['prenom'];

}

}
function  deconnecter(){
unset($_SESSION);//supprimer les données de la session 
session_destroy();//detruire la session
header("location:index.php");
die(); 

}


//recuperation de tous les documents
function recuperer_doc_partage($idpartenaire)
{
	$cnx=connecter_db();
	//$rp=$cnx->prepare("select * from $table order by id desc");
	$rp=$cnx->prepare("select p.* , pp.* ,d.* from partenaire p JOIN partage_partenaire pp on p.id=pp.partenaire_id join document d on pp.document_id=d.id where p.id=?");
	$rp->execute(array($idpartenaire));
	$data=$rp->fetchAll();
	return $data;
	
}


//recuperation de tous les documents
function recuperer_doc_partage_group($nom_groupe)
{
	$cnx=connecter_db();
	//$rp=$cnx->prepare("select * from $table order by id desc");
	$rp=$cnx->prepare("select g.* , pg.* ,d.* from groupe_partenaire g JOIN partage_groupe pg on g.id=pg.groupe_id join document d on pg.document_id=d.id where g.nom_groupe=?");
	$rp->execute(array($nom_groupe));
	$data=$rp->fetchAll();
	return $data;
	
}
 ?>

