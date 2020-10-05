<div class="col s12 section">
  <div class="message">
     <?php
     if (!empty($param['error'])) {
       switch ($param['error']) {
         case 'missingAdvertId':
           echo 'Ogłoszenie o takim identyfikatorze nie istnieje';
           break;
         case 'advertNotFound':
           echo 'Ogłoszenie nie zostało znalezione';
           break;
       }
     }
     ?>
   </div>
   <div class="message">
     <?php
     if (!empty($param['before'])) {
       switch ($param['before']) {
         case 'created':
           echo 'Ogłoszenie zostało dodane';
           break;
       }
     }
     ?>
   </div>

    <h4>Ostatnie Ogłoszenia</h4>
    <ul class="list">
      <?php foreach($param['adverts'] ?? [] as $advert): ?>
        <li>
            <div class="type">
          <!--      <span class="green">Full Time</span> -->
                <span class="right"><?php echo htmlentities($advert['created_at']) ?></span>
            </div>
            <div class="description">
                <h5><?php echo "[". htmlentities($advert['category'])."] ". htmlentities($advert['title']) . " (". htmlentities($advert['city']). ")" ?></h5>
                <img class="fit-picture" width="80"
                  src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg"
                  alt="Grapefruit slice atop a pile of other slices">
                <p><?php echo htmlentities($advert['description']) ?></p>
                <a href="/?action=show&id=<?php echo (int) $advert['id'] ?>">Szczegóły ogłoszenia</a>
            </div>
            <br>
              <hr>
        </li>
      <?php endforeach; ?>
        
    </ul>
    <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active blue darken-4"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
</div>
