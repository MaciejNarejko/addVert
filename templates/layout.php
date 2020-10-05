<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADVERT</title>

    <link rel="stylesheet" href="public/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </script>
</head>
<body>
    <div class="container">
        <div class="row section">
            <div class="company col s6">
                <a href="/"><h1>add<span id="companyName">Vert#</span></h1></a>
            </div>
            <div class="new col s6">
                <a href="#">Zaloguj</a> |
                <a href="#">Załóz konto</a>
                  <a href="/?action=create"><button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Dodaj
                  <i class="material-icons right">send</i>
                </button></a>
            </div>
        </div>
        <?php include_once("templates/pages/$page.php") ?>
        <footer>
            <p>Copyright @copy; 2020, AddVert, All Rights Reserved</p>
        </footer>
    </div>

</body>
</html>
