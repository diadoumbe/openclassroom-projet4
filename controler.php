<?php 

$db= new PDO('mysql:host=localhost;dbname=news','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'classbillet.php';
require_once 'classcomment.php';
require_once 'manager.php';

$message;

//LISTER TOUS LES BILLETS

$manager= new Managerbc($db);

$billets=$manager->getListb();

require 'index.php';
require 'admin.php';

$signals=$manager->signalistc();

require 'adsignal.php';

//AFFICHER BILLET ET SES COMMENTAIRES

if (isset($_GET['idbillet'])){
	 $idb=(int)$_GET['idbillet'];
	 $billet=$manager->getb($idb);
	 $comments=$manager->getListc($idb);
	
	 require 'billet.php';
	 require 'adbillet.php';
}

//AJOUT BILLET

if (isset($_POST['addb'])){
	$billet= new Billet([
			'auteurb'=>$_POST['auteurb'],
			'titreb'=>$_POST['titreb'],
			'messageb'=>$_POST['messageb'], 
	]);
	
	if ($billet->validb()){
		$manager->addb($billet);
	}
	$message='';
}

//AJOUT COMMENTAIRE

if (isset($_POST['addc'])){
	$comment= new Comment([
            'idbc'=>$_POST['idbc'],
			'auteurc'=>$_POST['auteurc'],
			'titrec'=>$_POST['titrec'],
			'commentc'=>$_POST['commentc'],
			'signalc'=> 0
	]);

	if ($comment->validc()){
		$manager->addc($comment);
	}
	$message='';
}


//MODIFIER BILLET

if (isset($_POST['updb'])){
	$billet= new Billet([
			'idb'=>$_POST['idb'],
			'auteurb'=>$_POST['auteurb'],
			'titreb'=>$_POST['titreb'],
			'messageb'=>$_POST['messageb'],
	]);

	if ($billet->validb()){
		$manager->updateb($billet);
		$message='BILLET MODIFIE!';
	}
	//$message='';
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

//SUPPRIMER BILLET

if (isset($_GET['delb'])){
	$delb=(int)$_GET['delb'];
	
	$manager->deleteb($delb);
	$manager->deleteListc($delb);
	
	$message='BILLET SUPPRIME!';
}


//SUPPRIMER UN COMMENTAIRE

if (isset($_GET['delc'])){
	$delc=(int)$_GET['delc'];

	$manager->deletec($delc);

	$message='COMMENTAIRE SUPPRIME!';
}

//SIGNALER COMMENTAIRE

if (isset($_GET['signalc'])){
	$sigc=(int)$_GET['signalc'];
	
	$manager->signalc($igc);
	$message='COMMENTAIRE SIGNALE!';
}


