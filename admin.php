<?php 

$db= new PDO('mysql:host=localhost;dbname=news','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'classbillet.php';
require_once 'classcomment.php';
require_once 'manager.php';

$manager= new Managerbc($db);

//LISTER TOUS LES BILLETS

$billets=$manager->getListb();
 
//AJOUT BILLET

if (isset($_POST['addb']) && isset($_POST['auteurb'])){
	$billet= new Billet([
			'auteurb'=>$_POST['auteurb'],
			'titreb'=>$_POST['titreb'],
			'messageb'=>$_POST['messageb'], 
	]);

	if ($billet->validb()){
		$res =$manager->addb($billet);
      $message='Article ajouté!';
		//if($res){ $message='Article ajouté!';}
		
	}
	else {$message="echec ajout article!";
	      $erreurs=$billet->erreurslistb();
	     }
	
}

//SUPPRIMER BILLET

if (isset($_GET['delb'])){
	$delb=(int)$_GET['delb'];
	
	$manager->deleteb($delb);
	$manager->deleteListc($delb);
	
	$message='billet supprimé!';
	
}

require 'adminvue.php';