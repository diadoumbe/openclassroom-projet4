<?php 

$db= new PDO('mysql:host=localhost;dbname=news','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'classbillet.php';
require_once 'classcomment.php';
require_once 'manager.php';

$manager= new Managerbc($db);

//AFFICHER BILLET ET SES COMMENTAIRES

if (isset($_GET['idbillet'])){
	
	 $idb=(int)$_GET['idbillet'];
	 
	 $billet=$manager->getb($idb);
	 $comments=$manager->getListc($idb);
	 	
}

//AJOUT COMMENTAIRE

if (isset($_POST['addc'])){
	$comment= new Comment([
            'idbc'=>(int)$_POST['idbc'],
			'auteurc'=>$_POST['auteurc'],
			'titrec'=>$_POST['titrec'],
			'commentc'=>$_POST['commentc'],
			'signalc'=> 0
	]);

	if ($comment->validc()){
		$manager->addc($comment);
		$message='Commentaire ajouté!';
		
	}
	else {$message="Echec ajout commentaire!";
	      $erreurcl=$comment->erreurslistc();
	     }
	
}

//SIGNALER COMMENTAIRE

if (isset($_GET['signalc'])){
	$sigc=(int)$_GET['signalc'];
	
	$manager->signalc($igc);
	$message1='commentaire signalé!';
	
}

require 'billetvue.php';
