<!DOCTYPE html>
 <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="ouvrage peur sur le nil par edmond millis.">
    <meta name="Keywords" content="roman edmond millis">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>Peur sur le nil,par edmond milis</title>
  </head>

  <body>
  
    <div id="global">
       <?php include ("header.php");?>
       
       <?php include ("poster.php");?>

       <!-- affichage de tous les billets -->       
       <section class="un">
       
             <?php if (empty($billets)){echo "AUCUN ARTICLE PUBLIE!";
              }else {?>
           
             <?php foreach ($billets as $billet): ?>
             
            <div class="cadrebillet">
            
                <h3><strong><?= $billet->titreb() ?> </strong></h3>

                <time><i><?= $billet->dateb() ?> </i></time>

                <h6><em><?= $billet->auteurb() ?> </em></h6>

                <p class="textuel"><?= nl2br($billet->messageb()) ?> </p>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href="billet.php?idbillet=<?php echo $billet->idb(); ?>">Voir Article et commentaires</a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="billet.php?idbillet=<?php echo $billet->idb(); ?>">Ajoutez un commentaire</a>
                      </td>
                  </tr>
                </table>                                                       

           </div> 
              
            <?php endforeach; ?>
            
            <?php }?>   
                 
       </section>
 
       <?php include ("footer.php");?>
             
    </div>
    
  </body>

 </html>

