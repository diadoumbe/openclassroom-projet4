
<?php $titre="Accueil administration";?>

<?php ob_start(); ?>

      <!-- ajout d article -->
       <section class="un">
           
           <h3 class="titrerubrique">Ajout article:</h3>
           
                <?php if (!empty($_GET['message'])){echo'<h3 class="actionok">'.htmlspecialchars($_GET['message']).'</h3> ';} ?>
       
           <div class="cadrebillet">
           
                <form action="./admin.php?action=addbillet" method="post" id="formbillet">
                
                      <fieldset>
                       
                         <legend>AJOUTER ARTICLE</legend>
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::TITREB_FAU, $erreurs)) echo 'TITRE INVALIDE!'; ?>
                               <label>
                                      Titre:
                               </label>
                                  <input type="text" required="required" name="titreb" pattern="[a-zA-Z _-]{1,50}" title="titre,50lettres max ex:a-z0-9">
                                  
                            </p>
                            
                      
                            <p><?php if (isset($erreurs)&& in_array(Billet::AUTEURB_FAU, $erreurs)) echo 'AUTEUR INVALIDE!'; ?>
                               <label>
                                      Auteur:
                               </label>
                                  <input type="text" required="required" name="auteurb" pattern="[a-zA-Z _-]{1,50}" title="auteur,50lettres max ex:a-z0-9">
                                  
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
             
             <?php if (!empty($billets)){?>
             <h3 class="titrerubrique">Articles:</h3>
            <?php }?>
            
            <?php if (!empty($message)){echo'<h3 class="actionok">'.htmlspecialchars($message).'</h3> ';} ?>
             
           <?php if (empty($billets)){echo "AUCUN ARTICLE PUBLIE!";
              }else {?>                            
                  
             <?php foreach ($billets as $billet): ?>
             
             <div class="cadrebillet">
             
                <h2>
                    <strong><?= htmlspecialchars($billet->titreb()) ?> </strong>
                </h2>                

                <h4>
                    <time><i>Edite le: <?= $billet->dateb() ?> </i></time>
                    &nbsp;&nbsp;&nbsp;
                    auteur: <em><?= htmlspecialchars($billet->auteurb()) ?> </em>
               </h4>

                <div class="textuel"><?= $billet->messageb()  ?> </div>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href="./admin.php?action=billetad&idbillet=<?php echo $billet->idb(); ?> " >Gerer article et commentaires</a>
                      </td>
                 
                      <td>
                          <a href="./admin.php?action=deladminb&delb=<?php echo $billet->idb(); ?> " >Supprimer article</a>
                      </td>
                  
                      <td>
                          <a href="./admin.php?action=billetad&idbillet=<?php echo $billet->idb(); ?> " >Modifier article</a>
                      </td>
                  </tr>
                </table>                                                         

           </div> 
            
             <?php endforeach; ?>
            
          <?php }?>
                 
       </section>       
<?php $contenu= ob_get_clean(); ?>

<?php require 'template2.php'; ?>



