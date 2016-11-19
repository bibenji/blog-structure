<br />
<div class="row" id="coms">
    <div class="large-8 large-push-2 columns">
        <div class="row">
            <div class="large-12 columns">
            <h4>Commentaires</h4>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
            <?php if(isset($messComSaved)) { ?>
            <h5><?php echo $messComSaved; ?></h5>
            <?php
            unset($messComSaved);
            } else { ?>
            <h5>Nouveau commentaire</h5>
                <form method="post" action="">
                  <div class="row">
                    <div class="medium-6 columns">
                      <label>Pseudo
                        <input type="text" name="pseudo" placeholder="">
                      </label>
                    </div>
                    <div class="medium-6 columns">
                      <label>Email (privé)
                        <input type="text" name="mail" placeholder="">
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="medium-12 columns">
                    <label>
                      Commentaire
                      <textarea name="commentaire2" placeholder=""></textarea>
                    </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="medium-12 columns">
                        <button type="submit" class="success button">Poster</button>
                        <button type="reset" class="alert button">Effacer</button>
                    </div>
                  </div>
                </form>
            <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
            <h5>Les commentaires</h5>
                 <?php
                if (count($lescommentaires) != 0) {
                foreach ($lescommentaires as $uncommentaire) { ?>
                    
                     <div class="row primary callout">

                      
                      <div class="large-1 column">
                          <img src="images\default_avatar.png" />
                      </div>
                        <div class="large-11 column">
                            <?php echo $uncommentaire['pseudo']; ?>
                            <?php
                            if (isset($uncommentaire['date'])) echo ', le '.$uncommentaire['date'];
                            ?> :<br />
                            <span class="one-comment"><?php echo $uncommentaire['commentaire2']; ?></span>
                        </div>
                        </div>                    
               <?php } } else { ?>
                <div class="primary callout">Aucun commentaire enregistré.</div>
               <?php } ?>

            </div>
        </div>	

    </div>
</div>
<br />