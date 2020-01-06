<!DOCTYPE html>
 <html>

  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="ouvrage peur sur le nil par edmond millis.">
    <meta name="Keywords" content="roman edmond millis">
     <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://kit.fontawesome.com/bf2f2c9ab5.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="style.css">   
    <title>Peur sur le nil,par edmond milis</title>
  </head>

  <body>
  
    <div id="global">
    
       <?php include ("adheader.php");?>

    
       <!--  affichage article -->
       <section class="un" >

                <?php if (isset($message)){echo $message;} ?> 
                
               <?php if (empty($billet)){echo "AUCUN BILLET A AFFICHER!";
               }else {?> 
                     
           <div class="cadrebillet">           
                            <h3>
                             <strong>
                                  <?= $billet->titreb()  ?>                                 
                             </strong>
                            </h3>                                                 
                            <h6>
                             <em>
                                  <?= $billet->auteurb()  ?>                                  
                             </em>
                            </h6>                                                  
                            <time>
                              <i>
                                Date: <?= $billet->dateb()  ?>                                  
                             </i>
                            </time>                                                  
                            <p class="textuel">
                              ><?= nl2br( $billet->messageb())?>                                  
                            </p>                
           </div>
           
            <?php }?>
           
       </section>


<section class="un">

         <?php if (isset($message1)){echo $message1;} ?>
         
          <?php if (empty($comment)){echo "VEUILLEZ SELECTIONNER UN COMMENTAIRE!";
          }else {?>
         
           <div class="cadrecomment">
             
            <?php if ($comment->signalc()==1){?> <h4 class="alert">Commentaire signalé!</h4> <?php }?>
             
                <h3><strong><?= $comment->titrec() ?> </strong></h3>

                <time><i><?= $comment->datec() ?> </i></time>

                <h6><em><?= $comment->auteurc() ?> </em></h6>

                <p class="textuel"><?= nl2br( $comment->commentc()) ?> </p>

                <table class="tablebillet">
                  <tr>
                  <tr>
                      <td>
                          <a href="adsignal.php?delc=<?php echo $comment->idc(); ?>">Supprimer commentaire</a>
                      </td>
                  </tr>
                </table>

           </div> 

            <?php }?>     

       </section>
   
       
       <!-- affichage de tous les commentaires de l article -->       
       <section class="un">

         <?php if (isset($message1bis)){echo $message1bis;} ?>
         
           <?php if (empty($signals)){echo "AUCUN COMMENTAIRES SIGNALES!";
           }else {?>
                      
             <?php foreach ($signals as $signal): ?>
             
           <div class="cadrecomment">
             
            <?php if ($signal->signalc()==1){?> <h4 class="alert">Commentaire signalé!</h4> <?php }?>
             
                <h3><strong><?= $signal->titrec() ?> </strong></h3>

                <time><i><?= $signal->datec() ?> </i></time>

                <h6><em><?= $signal->auteurc() ?> </em></h6>

                <p class="textuel"><?= nl2br( $signal->commentc()) ?> </p>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href="adsignal.php?idbilletsignal=<?php echo $signal->idbc(); ?>&idcomsignal=<?php echo $signal->idc(); ?>">Gerer article et commentaires</a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="adsignal.php?delc=<?php echo $signal->idc(); ?>">Supprimer commentaire</a>
                      </td>
                  </tr>
                 
                </table>                                                          

           </div> 
           
           <?php endforeach; ?>
               
             <?php }?>
                  
       </section>
 
       <?php include ("footerad.php");?>
             
    </div>
    
  </body>

 </html>



