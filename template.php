
<!DOCTYPE html>
 <html>

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="ouvrage Billet simple pour l'alaska par jean Forteroche.">
    <meta name="Keywords" content="roman jean forteroche">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">    
     <link rel="stylesheet" type="text/css" href="./contenu/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>Billet simple pour l'alaska, par jean Forteroche</title>
  </head>

  <body>
  
    <div id="global">
       
       <header>

  <div id="headerlogo">

   <div> <img alt="logo ecrivain" src="./contenu/image/logoecrivain.png" width="120"></div>
     <div>
       <span id="titreroman"><strong>BILLET SIMPLE POUR L'ALASKA</strong></span>
       <br>
       <span id="auteurtitre"><em>par jean Forteroche</em></span>
     </div>
  </div>

  <nav>

    <ul>
        <li>
            <a href="./index.php?action=index">Accueil</a>
        </li>

        <li>
            <a href=" ./admin/admin.php?action=admin">Connexion administration</a>
        </li>
        
    </ul>  
  
  </nav>
</header>
<section class="un">

    <div>
      <img alt="blog ecrivain" src="./contenu/image/ecrivain1.jpg" id="poster">    
    </div>
    
</section>
       
       <section class="rubrique">
                 <h3> <?= $titre ?></h3>
       </section>
       
       <div id="contenu">
       
            <?= $contenu ?>
            
       </div>
       
       
       <footer>
 
  <div>
     <img alt="billet simple pour l'alaska" src="./contenu/image/ecrivain2.jpg">
  </div>
  
  <nav>
    <ul>
     <li>
         <a href="./index.php?action=index">Accueil</a>      
      </li>
      <li>
         <a href="admin/admin.php?action=admin">Connexion  administration</a>      
      </li>
      <li>
         <a href="./contact.php">Reglement Contact</a>      
      </li>         
    </ul>  
  </nav>

</footer>
             
    </div>
        
    
  </body>

 </html>




