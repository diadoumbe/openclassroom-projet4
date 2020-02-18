<?php


require './function.php';
require './modele/classbillet.php';
require './modele/classcomment.php';
require './modele/manager.php';

$manager= new Managerbc($db);

//LISTER TOUS LES BILLETS

function listbillets($manager)
{/*require './function.php';
require './modele/classbillet.php';
require './modele/classcomment.php';
require './modele/manager.php';

$manager= new Managerbc($db);*/
	$billets=$manager->getListb();
	
	require 'vue/indexvue.php';
}


//AFFICHER BILLET ET SES COMMENTAIRES

function billet($manager,$id)
{
	$idb=(int)$id;
	
	$billet=$manager->getb($idb);
	$comments=$manager->getListc($idb);
	
	require 'vue/billetvue.php';
}


//AJOUT COMMENTAIRE

function addcomment($manager,$idbc,$auteurc,$titrec,$commentc)
{
	if ( isset($idbc) && isset($auteurc) && isset($titrec) && isset($commentc) )
	{	
	
		if (!empty($idbc) && !empty($auteurc) && !empty($titrec) && !empty($commentc))
		{
			$idb=(int)$idbc;
	
			$comment= new Comment([
					'idbc'=>$idbc,
					'auteurc'=>$auteurc,
					'titrec'=>$titrec,
					'commentc'=>$commentc,
					'signalc'=>0
			]);
			//print_r($comment);
			if ($comment->validc()){
	
				$res=$manager->addc($comment);
	
				$billet=$manager->getb($idb);
				$comments=$manager->getListc($idb);
	
				$message='COMMENTAIRE AJOUTE!';
	
				$auteurc=$titrec=$commentc=null;
				//unset($_POST);
	
			 header("location:./index.php?action=billet&idbillet=$idbc&message=$message");
			 exit();
	
			}
			else {
				$billet=$manager->getb($idb);
				$comments=$manager->getListc($idb);
	
				$message="ECHEC AJOUT COMMENTAIRE!";
				$erreurcl=$comment->erreurslistc();
			}
	
			require 'vue/billetvue.php';
		}
	}
	
}


//SIGNALER COMMENTAIRE

function signalcomment($manager)
{
	if (isset($_GET['signalc']) && isset($_GET['signaldb']))
	{
		$sigc=(int)$_GET['signalc'];
	
		$sigdb=(int)$_GET['signaldb'];
	
		$manager->signalc($sigc);
	
		$billet=$manager->getb($sigdb);
		$comments=$manager->getListc($sigdb);
	
		$message1='COMMENTAIRE SIGNALE!';
		
		require 'vue/billetvue.php';
	}	
}

