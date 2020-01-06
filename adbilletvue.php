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
       
       <!--  modification article -->
       <section class="un" >

                <?php if (isset($message)){echo $message;} ?>
 
                <?php if (empty($billet)){echo "SELECTIONNEZ UN ARTICLE!";
                }else {?>
       
           <div class="cadrebillet">
           
                <form action="adbillet.php" method="post" id="formbillet">
                
                      <fieldset>
                       
                         <legend>MODIFIER ARTICLE</legend>
                      
                            <p> <?php if (isset($erreurs)&& in_array(Billet::TITREB_FAU, $erreursb)) echo 'TITRE INVALIDE!'; ?>
                               <label>
                                      Titre:
                               </label>
                                  <input type="text" value="<?= $billet->titreb()  ?> " required="required" name="titreb" pattern="[a-zA-Z _-]{1,50}">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::AUTEURB_FAU, $erreursb)) echo 'AUTEUR INVALIDE!'; ?>
                               <label>
                                      Auteur:
                               </label>
                                  <input type="text" value="<?= $billet->auteurb()  ?>" required="required" name="auteurb" pattern="[a-zA-Z _-]{1,30}">
                                  
                            </p>
                            
                      
                            <p>
                                Date: <?= $billet->dateb()  ?>                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::MESSAGEB_FAU, $erreursb)) echo 'ARTICLE INVALIDE!'; ?>
                               <label>
                                      Article:
                               </label>
                                  <textarea rows="12" cols="" required="required" name="messageb" id="messageb1"><?= nl2br( $billet->messageb())?> </textarea>
                                  
                            </p>
                                 <input type="hidden" value="<?= $billet->idb() ?>" name="idb">

                          <p>
                             <input type="submit" value="modifier" name="updb">
                          </p>
                          
                      </fieldset>                     
                      
                </form>

              
                 <a class="abouton" href="adbillet.php?delb=<?php echo $billet->idb(); ?>">Supprimer article</a>
                              
                
           </div>
         
          <?php }?>
           
       </section>
       
       <!-- affichage de tous les commentaires de l article -->       
       <section class="un">

         <?php if (isset($message1)){echo $message1;} ?>
       
        <?php if (empty($comments)){echo "AUCUN COMMENTAIRES!";
         }else {?>       
           
             <?php foreach ($comments as $comment): ?>
             
            <div class="cadrebillet">
             
            <?php if ($comment->signalc()==1){?> <h4 class="alert">Commentaire signalé!</h4> <?php }?>
             
                <h3><strong><?= $comment->titrec() ?> </strong></h3>

                <time><i><?= $comment->datec() ?> </i></time>

                <h6><em><?= $comment->auteurc() ?> </em></h6>

                <p class="textuel"><?= nl2br($comment->commentc()) ?> </p>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href="adbillet.php?delc=<?php echo $comment->idc(); ?>">Supprimer commentaire</a>
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


