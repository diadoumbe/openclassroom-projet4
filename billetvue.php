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
       
                       <?php if (isset($message)){echo $message;} ?>
       
                      <?php if (empty($billet)){echo "SELECTIONNEZ UN BILLET!";
                       }else {?>
       
           <div class="cadrebillet">
             
                <h3><strong><?= $billet->titreb() ?> </strong></h3>

                <time><i><?= $billet->dateb() ?> </i></time>

                <h6><em><?= $billet->auteurb() ?> </em></h6>

                <p class="textuel"><?= $billet->messageb() ?> </p>             

           </div> 
           
           <?php }?>
                 
       </section>
 
       
       <!-- formulaire ajout commentaire -->
       <section class="un">
       
           <div>
           
                <form action="billet.php" method="post" id="formcomment">
                
                      <fieldset>
                       
                         <legend>AJOUTER UN COMMENTAIRE</legend>
                      
                            <p><?php if (isset($erreurscl)&& in_array(Comment::TITREC_FAU, $erreursc)) echo 'TITRE INVALIDE!'; ?>
                               <label>
                                      Titre:
                               </label>
                                  <input type="text" value=" " required="required" name="titrec" pattern="[a-zA-Z _-]{1,50}">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurscl)&& in_array(Comment::AUTEURC_FAU, $erreursc)) echo 'AUTEUR INVALIDE!'; ?>
                               <label>
                                      Auteur:
                               </label>
                                  <input type="text" value="" required="required" name="auteurc" pattern="[a-zA-Z _-]{1,30}">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurscl)&& in_array(Comment::COMMENTC_FAU, $erreursc)) echo 'COMMENTAIRE INVALIDE!'; ?>
                               
                                  <textarea rows="" cols="8" required="required" name="messagec" id="">Redigez commentaire </textarea>
                                  
                            </p>
                                 <input type="hidden" value="<?php if (!empty($billet)){ $billet->idb(); }?>" name="idbc">

                          <p>
                             <input type="submit" value="valider" name="addc">
                          </p>
                          
                      </fieldset>                     
                      
                </form>
                
           </div>
           
       </section>
       
       <!-- affichage de tous les commentaires du billet -->       
       <section class="un">

         <?php if (isset($message1)){echo $message1;} ?> 
       
        <?php if (empty($comments)){echo "AUCUN COMMENTAIRE!";
         }else {?>        
          
             <?php foreach ($comments as $comment): ?>
             
             <div class="cadrecomment">
             
            <?php if ($comment->signalc()==1){?> <h4 class="alert">Commentaire signalé!</h4> <?php }?>
             
                <h3><strong><?= $comment->titrec() ?> </strong></h3>

                <time><i><?= $comment->datec() ?> </i></time>

                <h6><em><?= $comment->auteurc() ?> </em></h6>

                <p class="textuel"><?= nl2br($comment->commentc()) ?> </p>

                <table class="tablecomment">
                  <tr>
                      <td>
                          <a href="billet.php?signalc=<?php echo $comment->idc(); ?>">Signaler commentaire</a>
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



