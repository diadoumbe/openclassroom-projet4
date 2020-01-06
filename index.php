<?php 

$db= new PDO('mysql:host=localhost;dbname=news','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'classbillet.php';
require_once 'classcomment.php';
require_once 'manager.php';

$manager= new Managerbc($db);

//LISTER TOUS LES BILLETS


$billets=$manager->getListb();

    require 'indexvue.php';
    

