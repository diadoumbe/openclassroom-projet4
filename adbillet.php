<?php 

$db= new PDO('mysql:host=localhost;dbname=news','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'classbillet.php';
require_once 'classcomment.php';
require_once 'manager.php';

$manager=new Managerbc($db);

//AFFICHER BILLET ET SES COMMENTAIRES

if (isset($_GET['idbillet'])){
	
	 $idb=(int)$_GET['idbillet'];
	 
	 $billet=$manager->getb($idb);
	 $comments=$manager->getListc($idb);
	 	 	
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
		$message='billet modifié!';
	}
	else {$message="echec modification billet";
	      $erreurs=$billet->erreurslistb();
	     }
	
}

//SUPPRIMER BILLET

if (isset($_GET['delb'])){
	$delb=(int)$_GET['delb'];
	
	$manager->deleteb($delb);
	$manager->deleteListc($delb);
	
	$message='billet supprimé!';
		
	//require 'adbillet.php';
}

//SUPPRIMER UN COMMENTAIRE

if (isset($_GET['delc'])){
	$delc=(int)$_GET['delc'];

	$manager->deletec($delc);

	$message1='commentaire supprimé!';
	
}


require 'adbilletvue.php';

