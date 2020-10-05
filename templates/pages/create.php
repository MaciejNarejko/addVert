
<?php /* echo htmlentities($page) ?>
  <?php echo $param['resultCreate'] */?>
  <div class="row section">
      <h4>Formularz dodania ogłoszenia</h4>
    <form action="/?action=create" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <select name="category" required="required" class="validate">
            <option value="" disabled selected>Wybierz kategorie</option>
            <option value="Elektronika">Elektronika</option>
            <option value="Motoryzacja">Motoryzacja</option>
            <option value="Praca">Praca</option>
            <option value="Sport">Sport</option>
          </select>
          <label>Kategoria</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input name="firstName" id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Imie</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">location_city</i>
          <input name="city" id="last_name" type="text" class="validate">
          <label for="last_name">Miasto</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input name="phone" id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telefon</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input type="text" name="title" id="autocomplete-input" class="autocomplete validate">
          <label for="autocomplete-input">Nagłówek</label>
        </div>
        <div class="input-field col s12">
          <textarea name="description" id="textarea1" class="materialize-textarea validate"></textarea>
          <label for="textarea1">Treść ogłoszenia</label>
        </div>
        <div class="input-field col s12">
          <p>
            <label>
              <input type="checkbox" id="filled-in-box" class="filled-in checkbox-blue-grey" />
              <span>Zapoznałem się i akceptuje regulamin serwisu addVert# oraz akceptuje to, że ogłoszenie wygaśnie samo za 30 dni</span>
            </label>
          </p>
        </div>
        <div class="input-field col s12">
          <button class="btn waves-effect addAdvert" type="submit" name="action">Dodaj
            <i class="material-icons right">send</i>
          </button>
        </div>
       </div>
     </form>
    </div>
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          const elems = document.querySelectorAll('select');
          const instances = M.FormSelect.init(elems);
      });
  </script>
