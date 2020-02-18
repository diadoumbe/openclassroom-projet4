<?php
require 'controler/controler2.php';

// admin,deladminb     billetad,updbilletad,delbilletad,delcbilletad     signalad,signalcdel,listsignalc

//LISTER TOUS LES BILLETS

if (isset($_GET['action']))
{
    if ($_GET['action']=='admin')
    {
    	listbillets($manager);
    }
}


//AJOUT BILLET

if (isset($_GET['action']))
{
	if ($_GET['action']=='addbillet')
	{
		if ( isset($_POST['addb']) && !empty($_POST['auteurb']) && !empty($_POST['titreb']) && !empty($_POST['messageb']))
		{
			addbillet($manager,$_POST['auteurb'],$_POST['titreb'],$_POST['messageb']);
		}
	}
}


//SUPPRIMER BILLET

if (isset($_GET['action']) && isset($_GET['delb']))
{
	if ($_GET['action']=='deladminb')
	{
		delbilletadmin($manager,$_GET['delb']);
	}
}


//AFFICHER BILLET ET SES COMMENTAIRES

if (isset($_GET['action']) && isset($_GET['idbillet']))
{
	if ($_GET['action']=='billetad')
	{
		//$idb=$_GET['idbillet'];
		
		billetad($manager,$_GET['idbillet']);
	}
}


//MODIFIER BILLET

if (isset($_GET['action']) /*&& isset($_GET['idbillet'])*/)
{
	if ($_GET['action']=='updbillet')
	{
		if (isset($_POST['updb']) && !empty($_POST['idb']) && !empty($_POST['auteurb']) && !empty($_POST['titreb']) && !empty($_POST['messageb']) )
		{
			updbilletad($manager,$_POST['idb'],$_POST['auteurb'],$_POST['titreb'],$_POST['messageb']);
			
			unset($_POST);
		}
	}
}




//SUPPRIMER BILLET

if (isset($_GET['action']) && isset($_GET['delb']))
{
	if ($_GET['action']=='delbilletad')
	{
		delbilletad($manager,$_GET['delb']);
	}
}


//SUPPRIMER UN COMMENTAIRE

if (isset($_GET['action']) && isset($_GET['delc']) && isset($_GET['delidb']))
{
	if ($_GET['action']=='delcbilletad')
	{
		delcbilletad($manager,$_GET['delc'],$_GET['delidb']);
	}
}


//LISTER TOUS LES COMMENTAIRES SIGNALES

if (isset($_GET['action']))
{
	if ($_GET['action']=='listsignalc')
	{
		listsignalc($manager);
	}
}


//AFFICHER lE BILLET ET LE COMMENTAIRE SIGNALE

if (isset($_GET['action']) && isset($_GET['idbilletsignal']) && isset($_GET['idcomsignal']))
{
	if ($_GET['action']=='signalad')
	{
		signalc($manager,$_GET['idbilletsignal'],$_GET['idcomsignal']);
	}
}


//SUPPRIMER UN COMMENTAIRE

if (isset($_GET['action']) && isset($_GET['delc']))
{
	if ($_GET['action']=='signalcdel')
	{
		signalcdel($manager,$_GET['delc']);
	}
}

