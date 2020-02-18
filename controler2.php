<?php

require './../function.php';
require './../modele/classbillet.php';
require './../modele/classcomment.php';
require './../modele/manager.php';

$manager= new Managerbc($db);

//LISTER TOUS LES BILLETS

function listbillets($manager)
{
	$billets=$manager->getListb();

	require 'vue/adminvue.php';
}


//AJOUT BILLET

function addbillet($manager,$auteurb,$titreb,$messageb)
{
	if ( !empty($auteurb) && !empty($titreb) && !empty($messageb))
	{
		$billet= new Billet([
				'auteurb'=>$auteurb,
				'titreb'=>$titreb,
				'messageb'=>$messageb,
		]);
	
		if ($billet->validb()){
			$res=$manager->addb($billet);
			$message='ARTICLE AJOUTE!';
	
	
			$billets=$manager->getListb();
			//if($res){ $message='Article ajouté!';}
			$auteurb=$titreb=$messageb=null;
		 //unset($_POST);
		 header("location:./admin.php?action=admin&message=$message");
		 exit();
	
		}
		else {$message="ECHEC AJOUT ARTICLE!";
		$erreurs=$billet->erreurslistb();
	
		$billets=$manager->getListb();
		}
	
		require 'vue/adminvue.php';
	}
}


//SUPPRIMER BILLET

function delbilletadmin($manager,$delb1)
{
	if (isset($delb1))
	{
		$delb=(int)$delb1;
	
		$manager->deleteb($delb);
		$manager->deleteListc($delb);
	
		$message='ARTICLE SUPPRIME!';
	
		$billets=$manager->getListb();
	
	}
	
	require 'vue/adminvue.php';
}


//AFFICHER BILLET ET SES COMMENTAIRES

function billetad($manager,$id)
{
	if (isset($id))
	{
	
		$idb=(int)$id;
	
	
		$billet=$manager->getb($idb);
		$comments=$manager->getListc($idb);
		
		require './vue/adbilletvue.php';
	}
}


//MODIFIER BILLET

function updbilletad($manager,$idb,$auteurb,$titreb,$messageb)
{
	if ( !empty($idb) && !empty($auteurb) && !empty($titreb) && !empty($messageb) )
	{
	
		$idb=(int)$_POST['idb'];
	
		$billet= new Billet([
				'idb'=>$_POST['idb'],
				'auteurb'=>$_POST['auteurb'],
				'titreb'=>$_POST['titreb'],
				'messageb'=>$_POST['messageb'],
		]);
	
		if ($billet->validb()){
			$res=$manager->updateb($billet);
			$message='ARTICLE MODIFIE!';
	
			$billet=$manager->getb($idb);
			$comments=$manager->getListc($idb);
				
			//header("location:adbillet.php?idbillet=$idbc&ampmessage=$message");
			//exit();
	
		}
		else {
			$message="ECHEC MODIFICATION ARTICLE!";
			$erreurs=$billet->erreurslistb();
				
			$billet=$manager->getb($idb);
			$comments=$manager->getListc($idb);
				
		}
		
		require './vue/adbilletvue.php';
	}
}


//SUPPRIMER BILLET

function delbilletad($manager,$id)
{
	if (isset($id)){
		$delb=(int)$id;
	
		$manager->deleteb($delb);
		$manager->deleteListc($delb);
	
		$billet=$manager->getb($delb);
		$comments=$manager->getListc($delb);
	
		$message='ARTICLE SUPPRIME!!';
	
		//require 'adbillet.php';
		require './vue/adbilletvue.php';
	}
}


//SUPPRIMER UN COMMENTAIRE

function delcbilletad($manager,$delc,$delidb)
{
	if (isset($delc) && isset($delidb)){
	
		$delc=(int)$delc;
	
		$delibc=(int)$delidb;
	
		$manager->deletec($delc);
	
		$billet=$manager->getb($delibc);
		$comments=$manager->getListc($delibc);
	
		$message1='COMMENTAIRE SUPPRIME!';
		
		require './vue/adbilletvue.php';
	
	}
	
}


//LISTER TOUS LES COMMENTAIRES SIGNALES

function listsignalc($manager)
{
	$signals=$manager->signalistc();
	
	require './vue/adsignalvue.php';
}


//AFFICHER lE BILLET ET LE COMMENTAIRE SIGNALE

function signalc($manager,$idbilletsignal,$idcomsignal)
{
	if (isset($idbilletsignal) && isset($idcomsignal))
	{
	
		$idb=(int)$idbilletsignal;
		$idc=(int)$idcomsignal;
	
		$billet=$manager->getb($idb);
		$comment=$manager->getc($idc);
	
		$signals=$manager->signalistc();
		
		require './vue/adsignalvue.php';
	
	}
}


//SUPPRIMER UN COMMENTAIRE

function signalcdel($manager,$delco)
{
	$delc=(int)$delco;
	
	$manager->deletec($delc);
	
	$message1='COMMENTAIRE SUPPRIME!';
	
	$signals=$manager->signalistc();
	
	require './vue/adsignalvue.php';
}
