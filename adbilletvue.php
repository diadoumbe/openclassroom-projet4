
<?php $titre="Article et commentaires administration";?>

<?php ob_start(); ?>

      <!--  modification article -->
       <section class="un" >
           
           <h3 class="titrerubrique">Article:</h3>
           
                <?php if (isset($message)){echo'<h3 class="actionok">'.htmlspecialchars($message).'</h3> '; } ?>
 
                <?php if (empty($billet)){echo "<a href='admin.php'>SELECTIONNEZ UN ARTICLE, ici!</a>";
                }else {?>
       
           <div class="cadrebillet">
           
                <form action="./admin.php?action=updbillet" method="post" id="formbillet">
                
                      <fieldset>
                       
                         <legend>MODIFIER ARTICLE</legend>
                      
                            <p> <?php if (isset($erreurs)&& in_array(Billet::TITREB_FAU, $erreursb)) echo 'TITRE INVALIDE!'; ?>
                               <label>
                                      Titre:
                               </label>
                                  <input type="text" value="<?= htmlspecialchars($billet->titreb())  ?> " required="required" name="titreb" pattern="[a-zA-Z _-]{1,50}" title="titre,50lettres max ex:a-z0-9">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::AUTEURB_FAU, $erreursb)) echo 'AUTEUR INVALIDE!'; ?>
                               <label>
                                      Auteur:
                               </label>
                                  <input type="text" value="<?= $billet->auteurb()  ?>" required="required" name="auteurb" pattern="[a-zA-Z _-]{1,50}" title="auteur,50lettres max ex:a-z0-9">
                                  
                            </p>
                            
                      
                            <p>
                                Edite le: <?= $billet->dateb()  ?>                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::MESSAGEB_FAU, $erreursb)) echo 'ARTICLE INVALIDE!'; ?>
                               <label>
                                      Article:
                               </label>
                                 
                                  <textarea rows="12" cols=""  required="required" name="messageb" id="messageb1"><?= htmlspecialchars(nl2br( $billet->messageb()))?> </textarea>
                                  
                            </p>
                                 <input type="hidden" value="<?= $billet->idb() ?>" name="idb">

                          <p>
                             <input type="submit" value="modifier" name="updb">
                          </p>
                          
                      </fieldset>                     
                      
                </form>

                <p>
                   <a class="abouton" href="./admin.php?action=delbilletad&delb=<?php echo $billet->idb(); ?>">Supprimer article</a>
                </p>             
                
           </div>
         
          <?php }?>
           
       </section>
       
       <!-- affichage de tous les commentaires de l article -->       
       <section class="un">
            
            <?php if (!empty($comments)){?>
            <h3 class="titrerubrique">Commentaires:</h3>
            <?php }?>
            
         <?php if (isset($message1)){echo '<h3 class="actionok">'.$message1.'</h3>';} ?>
       
        <?php  if (empty($comments)){echo "AUCUN COMMENTAIRES!";
         }else {?>       
           
             <?php foreach ($comments as $comment): ?>
             
            <div class="cadrecomment">
             
            <?php if ($comment->signalc()==1){?> <h3 class="alert">Commentaire signale!</h3> <?php }?>
             
                <h2>
                    <strong><?= htmlspecialchars($comment->titrec()) ?> </strong>
                </h2>                

                <h4>
                    <time><i>Edite le: <?= $comment->datec() ?> </i></time>
                    &nbsp;&nbsp;&nbsp;
                    auteur:<em><?= htmlspecialchars($comment->auteurc()) ?> </em>
               </h4>

                <div class="textuel"><?= htmlspecialchars($comment->commentc()) ?> </div>

                <table class="tablecomment">
                  <tr>
                      <td>
                          <a href="./admin.php?action=delcbilletad&delc=<?php echo $comment->idc(); ?>&delidb=<?php echo $comment->idbc(); ?>">Supprimer commentaire</a>
                      </td>
                  </tr>
                </table>                                        

           </div> 
          
          <?php endforeach; ?>
               
          <?php  }?>     
                 
       </section>       
<?php $contenu= ob_get_clean(); ?>

<?php require 'template2.php'; ?>


