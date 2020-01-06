<!DOCTYPE html>
 <html>

  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="ouvrage peur sur le nil par edmond millis.">
    <meta name="Keywords" content="roman edmond millis">
     <link rel="stylesheet" type="text/css" href="style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>Peur sur le nil,par edmond milis</title>
  </head>

  <body>
  
    <div id="global">
       <?php include ("adheader.php");?>
       
       <!-- ajout d article -->
       <section class="un">

                <?php if (isset($message)){echo $message;} ?>
       
           <div class="cadrebillet">
           
                <form action="admin.php" method="post" id="formbillet">
                
                      <fieldset>
                       
                         <legend>AJOUTER ARTICLE</legend>
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::TITREB_FAU, $erreurs)) echo 'TITRE INVALIDE!'; ?>
                               <label>
                                      Titre:
                               </label>
                                  <input type="text" required="required" name="titreb" pattern="[a-zA-Z _-]{1,50}">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::AUTEURB_FAU, $erreurs)) echo 'AUTEUR INVALIDE!'; ?>
                               <label>
                                      Auteur:
                               </label>
                                  <input type="text" required="required" name="auteurb" pattern="[a-zA-Z _-]{1,30}">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::MESSAGEB_FAU, $erreurs)) echo 'ARTICLE INVALIDE!'; ?>
                               <label>
                                      Article:
                               </label>
                                  <textarea rows="12" cols="" required="required" name="messageb" id="messageb"> </textarea>
                                  
                           </p>
                                 
                          <p>
                             <input type="submit" value="ajouter" name="addb">
                          </p>
                          
                      </fieldset>                     
                      
                </form>
                
           </div>
           
       </section>
       
       <!-- affichage de tous les billets -->       
       <section class="un">
       
        <?php if (empty($billets)){echo "AUCUN ARTICLE PUBLIE!";
         }else {?>
                  
             <?php foreach ($billets as $billet): ?>
             
             <div class="cadrebillet">
             
                <h3><strong><?= $billet->titreb() ?> </strong></h3>

                <time><i><?= $billet->dateb() ?> </i></time>

                <h6><em><?= $billet->auteurb() ?> </em></h6>

                <p class="textuel"><?=nl2br($billet->messageb())  ?> </p><p>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href="adbillet.php?idbillet=<?php echo $billet->idb(); ?> " >Gerer article et commentaires</a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="admin.php?delb=<?php echo $billet->idb(); ?> " >Supprimer article</a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="adbillet.php?idbillet= <?php echo $billet->idb(); ?> " >Modifier article</a>
                      </td>
                  </tr>
                </table>                                                         

           </div> 
            
             <?php endforeach; ?>
            
          <?php }?>
                 
       </section>
 
       <?php include ("footerad.php");?>
             
    </div>
    
    <script type="text/javascript" src="mce.js"></script>
  </body>

 </html>

