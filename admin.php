<!DOCTYPE html>
 <html>

  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="blog ecrivain avec articles et commentaires.">
    <meta name="Keywords" content="ecrivain blog">
     <link rel="stylesheet" type="text/css" href="styles.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>blog ecrivain</title>
  </head>

  <body>
  
    <div id="global">
       <?php include ("adheader.php");?>
       
       <!-- ajout d article -->
       <section class="un">

                <?php if (isset($message)){echo $message;} ?>

       
           <div>
           
                <form action="modele.php" method="post" id="formbillet">
                
                      <fieldset>
                       
                         <legend>AJOUTER ARTICLE</legend>
                      
                            <p>
                               <label>
                                      Titre:
                               </label>
                                  <input type="text" value=" " required="required" name="titreb" pattern="[a-zA-Z]">
                                  
                            </p>
                            
                      
                            <p>
                               <label>
                                      Auteur:
                               </label>
                                  <input type="text" value="" required="required" name="auteurb" pattern="[a-zA-Z]">
                                  
                            </p>
                            
                      
                            <p>
                               <label>
                                      Article:
                               </label>
                                  <textarea rows="" cols="8" required="required" name="messageb" id="messageb"> </textarea>
                                  
                           </p>
                                 
                          <p>
                             <input type="submit" value="ajouter" name="updb">
                          </p>
                          
                      </fieldset>                     
                      
                </form>
                
           </div>
           
       </section>
       
       <!-- affichage de tous les billets -->       
       <section class="un">
       
           <div class="cadrebillet">
             <?php foreach ($billets as $billet): ?>
             
                <h3><?= $billet->titreb() ?> </h3>

                <time><?= $billet->dateb() ?> </time>

                <h6><?= $billet->auteurb() ?> </h6>

                <p><?= $billet->messageb() ?> </p>

                <table class="tablebillet">
                  <tr>
                      <td>
                          <a href="controler.php?idbillet=<?= $billet->idb() ?>">Gerer article et commentaires</a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="controler.php?delb=<?= $billet->idb() ?>">Supprimer article</a>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="controler.php?idbillet=<?= $billet->idb() ?>">Modifier article</a>
                      </td>
                  </tr>
                </table>
                
                <hr>
             
             <?php endforeach; ?>

           </div> 
                 
       </section>
 
       <?php include ("adfooter.php");?>
             
    </div>
    
    <script type="text/javascript" src="mce.js"></script>
  </body>

 </html>
