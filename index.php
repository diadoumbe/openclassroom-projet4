<!DOCTYPE html>
 <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="blog ecrivain avec articles et commentaires.">
    <meta name="Keywords" content="ecrivain blog">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>blog ecrivain</title>
  </head>

  <body>
  
    <div id="global">
       <?php include ("header.php");?>
       
       <?php include ("poster.php");?>

       <!-- affichage de tous les billets -->       
       <section class="un">
       
           <div class="cadrebillet">
             <?php foreach ($billets as $billet): ?>
             
                <h3><?= $billet->titreb() ?> </h3>

                <time><?= $billet->dateb() ?> </time>

                <h6><?= $billet->auteurb() ?> </h6>

                <p><?= $billet->messageb() ?> </p>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href="controler.php?idbillet=<?= $billet->idb() ?>">Voir Article et commentaires</a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="controler.php?idbillet=<?= $billet->idb() ?>">Ajoutez un commentaire</a>
                      </td>
                  </tr>
                </table>
                
                <hr>
             
             <?php endforeach; ?>

           </div> 
                 
       </section>
 
       <?php include ("footer.php");?>
             
    </div>
    
  </body>

 </html>
