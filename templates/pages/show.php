<div class="advertDetails section">

  <?php $advert = $param['advert'] ?? null; ?>
  <?php if ($advert) : ?>
    <ul class="owner">
      <li>
        <img class="fit-picture" width="80"
          src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg">
          <h4><?php echo "[". htmlentities($advert['category'])."] ". htmlentities($advert['title']) . " (". htmlentities($advert['city']). ")" ?></h4>
      <br><br></li>
      <li>Dodano: <?php echo htmlentities($advert['created_at']) ?></li>
      <li>Osoba:  <?php echo htmlentities($advert['firstName']) ?></li>
      <li>Miasto: <?php echo htmlentities($advert['city']) ?></li>
      <li>Email:  <?php echo htmlentities($advert['email']) ?></li>
      <li>Telefon: <?php echo htmlentities($advert['phone']) ?></li>
      <br>

      <li>Treść ogłoszenia: <br><p><?php echo htmlentities($advert['description']) ?><p></li>

    </ul>
  <?php else : ?>
    <div>Brak ogłoszenia do wyświetlenia</div>
  <?php endif; ?>
  <a href="/">
    <button class="btn waves-effect addAdvert" type="submit" name="action">Powrót</button>
  </a>
</div>
