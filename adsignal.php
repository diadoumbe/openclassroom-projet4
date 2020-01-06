<?php 

$db= new PDO('mysql:host=localhost;dbname=news','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'classbillet.php';
require_once 'classcomment.php';
require_once 'manager.php';

$manager= new Managerbc($db);

//LISTER TOUS LES COMMENTAIRES SIGNALES
$signals=$manager->signalistc();

    $message1bis="";        

//AFFICHER lE BILLET ET LE COMMENTAIRE SIGNALE

if (isset($_GET['idbilletsignal']) && isset($_GET['idcomsignal'])){
	
	$idb=(int)$_GET['idbilletsignal'];
	$idc=(int)$_GET['idcomsignal'];
	
	$billet=$manager->getb($idb);
	$comment=$manager->getc($idc);

}

//MODIFIER COMMENTAIRE
/*
if (isset($_POST['updc'])){
	$comment= new Comment([
			'idc'=>$_POST['idc'],
			'idbc'=>$_POST['idbc'],
			'auteurc'=>$_POST['auteurc'],
			'titrec'=>$_POST['titrec'],
			'commentc'=>$_POST['commentc'],
	]);

	if ($comment->validc()){
		$manager->updatec($comment);
		$message='COMMENTAIRE MODIFIE!';
	}
	//$message='';
}  */

//SUPPRIMER UN COMMENTAIRE

if (isset($_GET['delc'])){
	$delc=(int)$_GET['delc'];

	$manager->deletec($delc);

	$message1='commentaire supprimé!';
	
}

require 'adsignalvue.php';


