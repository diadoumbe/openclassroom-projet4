<?php

require './controler/controler1.php';

// index   billet,signalcom

//LISTER TOUS LES BILLETS

if (isset($_GET['action']))
{
	if ($_GET['action']=='index')
	{
		listbillets($manager);
		//require 'vue/indexvue.php';
	}
 
}


//AFFICHER BILLET ET SES COMMENTAIRES

if (/*isset($_GET['idbillet']) &&*/ isset($_GET['action']) )
{
    if ($_GET['action']=='billet')
       {
    	if (isset($_GET['idbillet']))
    	  {
    	  	$idb=(int)$_GET['idbillet'];
    	  	billet($manager,$idb);
    	  	
    	  	//require 'vue/billetvue.php';
    	  }
    	  
       }
       
}


//AJOUT COMMENTAIRE

if ( isset($_GET['action']) )
{
	if ($_GET['action']=='addcomment')
	{
		if (isset($_POST['addc']) && isset($_POST['idbc']) && isset($_POST['auteurc']) && isset($_POST['titrec']) && isset($_POST['commentc']) )
		{
			addcomment($manager,$_POST['idbc'],$_POST['auteurc'],$_POST['titrec'],$_POST['commentc']);
			
			unset($_POST);
		
		}
		 
	}
	 
}



//SIGNALER COMMENTAIRE

if (isset($_GET['action']) && isset($_GET['signalc']) && isset($_GET['signaldb']))
{
    if ($_GET['action']=='signalcom')
    {
     signalcomment($manager);
     
     //require 'vue/billetvue.php';
    }
}


//action par defaut pour la page index 

if ( !isset($_GET['action']) )
{
	listbillets($manager);
}
