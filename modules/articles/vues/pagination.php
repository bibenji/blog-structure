<?php
    $cur_url = array('tous', 'amour-et-seduction', 'bien-etre', 'sexualite', 'vie-sociale');
    $cur_url = $cur_url[$_GET['categorie']];

    $totalpages = ceil($autotal / ARTS_PAR_PAGE);
?>

<div class="row">
    <div class="large-12 columns">
     <ul class="pagination" role="menubar" aria-label="Pagination">
      <li class="arrow unavailable" aria-disabled="true"><a href="
       <?php        
        if ($ledeb != 0) {                                
                echo $cur_url;
                if ($ledeb - ARTS_PAR_PAGE) echo '-'.($ledeb - ARTS_PAR_PAGE);            
        }
        ?>">&laquo; Précédent</a></li>
      
        <?php for($i = 0; $i < $totalpages; $i++) { ?>
        <li<?php
            if (($i*ARTS_PAR_PAGE) == $ledeb) echo ' class="current"';
            ?>
            ><a href="
            <?php
                echo $cur_url;
                if ($i*ARTS_PAR_PAGE) echo '-'.($i*ARTS_PAR_PAGE);
            
            ?>">
            <?php echo $i+1; ?></a></li>
            <?php
            }
         ?>
      
      <!--<li class="unavailable" aria-disabled="true"><a href="">&hellip;</a></li>-->
      <li class="arrow"><a href="<?php
          if ($ledeb != ($totalpages*ARTS_PAR_PAGE)-ARTS_PAR_PAGE) {            
                  echo $cur_url.'-'.($ledeb+ARTS_PAR_PAGE);
          }
        ?>">Suivant &raquo;</a></li>
    </ul>
    </div>
</div>