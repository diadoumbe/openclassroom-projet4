<?php

            // instance en local 

$db= new PDO('mysql:host=localhost;dbname=news','root','',array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
                       

            // instance en production sur billetalaskadia.fr
/*
$db= new PDO('mysql:host=billetaljadia10.mysql.db;dbname=billetaljadia10','billetaljadia10','Gringo10',array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
*/



//instance bdd en production
/*$db= new PDO('mysql:host=billetaljadia10.mysql.db;dbname=billetaljadia10','billetaljadia10','Gringo10');
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
/*
 $db= new PDO('mysql:host=localhost;dbname=news','root','');
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 */
