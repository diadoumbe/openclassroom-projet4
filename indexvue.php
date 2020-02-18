
<?php $titre="Accueil";?>

<?php ob_start(); ?>

       <!-- affichage de tous les billets -->       
       <section class="un">
           
           <?php if (!empty($billets)){?>
            <h3 class="titrerubrique">Articles:</h3>
          <?php }?>
            
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
                     auteur:<em> <?= htmlspecialchars($billet->auteurb()) ?> </em>
               </h4>

                <div class="textuel"><?= $billet->messageb() ?> </div>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href=" ./index.php?action=billet&idbillet=<?php echo $billet->idb(); ?>">Voir Article et commentaires</a>
                      </td>
                                   
                      <td>
                          <a href=" ./index.php?action=billet&idbillet=<?php echo $billet->idb(); ?>">Ajoutez un commentaire</a>
                      </td>
                  </tr>
                </table>                                                       

           </div> 
              
            <?php endforeach; ?>
            
            <?php }?>   
                 
       </section>
       

<?php $contenu= ob_get_clean(); ?>

<?php require 'template.php'; ?>

