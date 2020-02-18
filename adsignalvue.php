
<?php $titre="Commentaires signales administration";?>

<?php ob_start(); ?>

       <!--  affichage article -->
       <section class="un" >
           
           <?php if (isset($billet)){?>
           <h3 class="titrerubrique">Article:</h3>
          <?php }?>
           
                <?php if (!empty($message)){echo'<h3 class="actionok">'.htmlspecialchars($message).'</h3> ';} ?> 
                
               <?php if (!empty($billet)){ ?> 
                     
           <div class="cadrebillet">           
                            <h2>
                                <strong>
                                       <?= htmlspecialchars($billet->titreb())  ?>                                 
                               </strong>
                            </h2> 
                                                                            
                            <h4>
                                <time>
                                 <i>
                                    Edite le: <?= $billet->dateb()  ?>                                  
                                </i>
                               </time>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                auteur:
                                <em>
                                    <?= htmlspecialchars($billet->auteurb())  ?>                                  
                                </em>
                            </h4>                                                  
                                                                             
                            <div class="textuel">
                              <?=  $billet->messageb() ?>                                  
                            </div>                
           </div>
           
            <?php }?>
           
       </section>


<section class="un">
          
          <?php if (!empty($comment)){?>
          <h3 class="titrerubrique">Commentaire:</h3>
         <?php }?>
          
         <?php if (!empty($message1)){echo'<h3 class="actionok">'.htmlspecialchars($message1).'</h3> ';} ?>
         
          <?php if (!empty($comment)){ ?>
         
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

                <div class="textuel"><?=  htmlspecialchars($comment->commentc()) ?> </div>

                <table class="tablecomment">
                  
                  <tr>
                      <td>
                          <a href="./admin.php?action=signalcdel&delc=<?php echo $comment->idc(); ?>">Supprimer commentaire</a>
                      </td>
                  </tr>
                </table>

           </div> 

            <?php }?>     

       </section>
   
       
       <!-- affichage de tous les commentaires de l article -->       
       <section class="un">
          
          <?php if (!empty($signals)){?>
          <h3 class="titrerubrique">Commentaires:</h3>
         <?php }?>
          
         <?php if (isset($message1bis)){echo'<h3 class="actionok">'.htmlspecialchars($message1bis).'</h3> ';} ?>
         
           <?php if (empty($signals)){echo "AUCUN COMMENTAIRES SIGNALES!";
           }else {?>
                      
             <?php foreach ($signals as $signal): ?>
             
           <div class="cadrecomment">
             
            <?php if ($signal->signalc()==1){?> <h4 class="alert">Commentaire signale!</h4> <?php }?>
             
                <h2>
                    <strong><?= htmlspecialchars($signal->titrec()) ?> </strong>
               </h2>                

                <h4>
                     <time><i>Edite le: <?= $signal->datec() ?> </i></time>
                     &nbsp;&nbsp;&nbsp;
                     auteur:<em><?= htmlspecialchars($signal->auteurc()) ?> </em>
               </h4>

                <div class="textuel"><?= htmlspecialchars( $signal->commentc()) ?> </div>

                <table class="tablecomment">
                  <tr>
                      <td>
                          <a href="./admin.php?action=signalad&idbilletsignal=<?php echo $signal->idbc(); ?>&idcomsignal=<?php echo $signal->idc(); ?>">Gerer article et commentaires</a>
                      </td>
                  
                      <td>
                          <a href="./admin.php?action=signalcdel&delc=<?php echo $signal->idc(); ?>">Supprimer commentaire</a>
                      </td>
                  </tr>
                 
                </table>                                                          

           </div> 
           
           <?php endforeach; ?>
               
             <?php }?>
                  
       </section>      
<?php $contenu= ob_get_clean(); ?>

<?php require 'template2.php'; ?>



