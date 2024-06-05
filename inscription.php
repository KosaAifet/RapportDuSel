<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Inscription</title>
  </head>

  <!-- Body -->
  <body>
    <!-- Header -->
    <header>
      <!-- Header Principal -->
      <?php require_once __DIR__ . './templates/mainHeader.tpl.html';?>

      <!-- Navigation Principale -->
      <?php require_once __DIR__ . './templates/mainNav.tpl.html';?>
    </header>

    <!-- Main -->
    <main role="main">
      <!-- Inscription -->
      <article class="form_inscription flex-center flex-to-column">
        <h1 class="">Inscrivez-vous</h1>
        <form id="inscription" action="" method="post" class="flex-center wrap">

          <div class="form_inscription_bloc flex-spaceBetween wrap marginY-xs">
            <div class="form_inscription_input"> 
              <input
                id="inscription_nom"
                name="nom"
                type="text"
                placeholder="Nom..."
                required
              />
            </div>
          
            <div class="form_inscription_input"> 
              <input
                id="inscription_prenom"
                name="prenom"
                type="text"
                placeholder="Prenom..."
                required
              />
            </div>
          </div>

          <div class="form_inscription_bloc flex-spaceBetween wrap marginY-xs">
            <div class="form_inscription_input flex-spaceBetween">
              <label for="inscription_genre">Genre :</label>
              <select  name="genre" id="inscription_genre">
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Autre">Autre</option>
              </select>
            </div>

            <div class="form_inscription_input">
              <input
                id="inscription_ddn"
                name="ddn"
                type="date"
                placeholder="Date de naissance..."
                required
              />
            </div>
          </div>
          
          <div class="form_inscription_bloc marginY-xs">
            <input
              id="inscription_email"
              name="email"
              type="email"
              placeholder="Email..."
              required
            />
          </div>
          
          <div class="form_inscription_bloc flex-spaceBetween wrap marginY-xs">
            <div class="form_inscription_input">
              <input
                id="inscription_mdp"
                name="mdp"
                type="password"
                placeholder="Mot de passe..."
                required
              />
            </div>

            <div class="form_inscription_input">
              <input
                id="inscription_cmdp"
                name="cmdp"
                type="password"
                placeholder="Confirmez le Mot de passe..."
                required
              />
            </div>
          </div>
          
          <div class="form_inscription_valider flex-center marginY-s">
            <input
              id="inscription_valider"
              name="valider"
              type="submit"
              value="Inscription"
              onclick="inscription()"
            />
          </div>
        </form>
      </article>
    </main>

    <!-- Requête Inscription -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('inscription').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            axios.post('./controller/inscriptionController.php', formData)
                .then(response => alert('Inscription réussie!'))
                .catch(error => alert('Erreur lors de l\'inscription: ' + error));
        });
    </script>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>


