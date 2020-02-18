
<?php $titre="Article et commentaires";?>

<?php ob_start(); ?>

<!-- affichage du billet -->       
       <section class="un">
          
          <?php if (!empty($billet))
                {?> 
                 <h3 class="titrerubrique">Article:</h3>
          <?php }
          else {
          	    echo '<a href="./index.php">veuillez selectionez un article ici!</a>';
               }?>
           
               <?php if (!empty($_GET['message'])){ echo '<h3 class="actionok">'.htmlspecialchars($_GET['message']).'</h3>';}?>
       
               <?php if (empty($billet)){echo "SELECTIONNEZ UN BILLET!";
                                        }else {  $hideid=$billet->idb();    ?>
       
           <div class="cadrebillet">
             
                <h2>
                    <strong><?= htmlspecialchars($billet->titreb()) ?> </strong>
                </h2>                

                <h4>
                    <time><i>Edite le: <?= $billet->dateb() ?> </i></time>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    auteur:<em> <?= htmlspecialchars($billet->auteurb()) ?> </em>
               </h4>

                <div class="textuel"><?= $billet->messageb() ?> </div>             

           </div> 
           
           <?php // }?>
                 
       </section>
 
       
       <!-- formulaire ajout commentaire -->
       <section class="un">
       
           <h3 class="titrerubrique">Ajout commentaire:</h3>
       
           <div class="cadrecomment">
           
                <form action="./index.php?action=addcomment" method="post" id="formcomment" autocomplete="off">
                
                      <fieldset>
                       
                         <legend>AJOUTER UN COMMENTAIRE</legend>
                      
                            <p><?php if (isset($erreurscl)&& in_array(Comment::TITREC_FAU, $erreursc)) echo 'TITRE INVALIDE!'; ?>
                               <label>
                                      Titre:
                               </label>
                                  <input type="text" value="" required="required" name="titrec" id="titrec" pattern="[a-zA-Z _-]{1,50}" title="titre,50lettres max ex:a-z0-9">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurscl)&& in_array(Comment::AUTEURC_FAU, $erreursc)) echo 'AUTEUR INVALIDE!'; ?>
                               <label>
                                      Auteur:
                               </label>
                                  <input type="text" value="" required="required" name="auteurc" id="auteurc" pattern="[a-zA-Z _-]{1,50}" title="auteur,50lettres max ex:a-z0-9">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurscl)&& in_array(Comment::COMMENTC_FAU, $erreursc)) echo 'COMMENTAIRE INVALIDE!'; ?>
                               
                                  <textarea rows="5" cols="" required="required" minlength="2" maxlength="300" title="Redigez commentaire, 300 lettres maximum ex:a-z0-9 et ponctuations" name="commentc" id="messagec"> </textarea>
                                  
                            </p>
                                 <input type="hidden" value="<?php echo $hideid;?>" name="idbc">
                                 <input type="hidden" value="" name="signalc">

                          <p>
                             <input type="submit" value="valider" name="addc">
                          </p>
                          
                      </fieldset>                     
                      
                </form>
                
           </div>
           
       </section>
        <?php }?>
       <!-- affichage de tous les commentaires du billet -->       
       <section class="un">
             
         <?php if (!empty($comments)){?>
             <h3 class="titrerubrique">Commentaires:</h3>
        <?php }?>
             
         <?php if (isset($message1)){echo '<h3 class="actionok">'.htmlspecialchars($message1).'</h3>';} ?> 
       
        <?php if (empty($comments)){echo "AUCUN COMMENTAIRE!";
         }else {?>        
          
             <?php foreach ($comments as $comment): ?>
             
             <div class="cadrecomment">
             
            <?php if ($comment->signalc()==1){?> <h3 class="alert">Commentaire signale!</h3> <?php }?>
             
                <h2>
                    <strong><?= htmlspecialchars($comment->titrec()) ?> </strong>
                </h2>
                
                <h4>
                    <time><i>Edite le: <?= $comment->datec() ?> </i></time>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    auteur:<em><?= htmlspecialchars($comment->auteurc()) ?> </em>
                </h4>

                <div class="textuel"><?= nl2br(htmlspecialchars($comment->commentc())) ?> </div>

                <table class="tablecomment">
                  <tr>
                      <td>
                          <a href="./index.php?action=signalcom&signalc=<?php echo $comment->idc(); ?>&signaldb=<?php echo $comment->idbc(); ?>">Signaler commentaire</a>
                      </td>
                  </tr>
                </table>                                
                         
           </div> 
               
           <?php endforeach; ?>    
          
          <?php }?>
                
       </section>
       

<?php $contenu= ob_get_clean(); ?>

<?php require 'template.php'; ?>
