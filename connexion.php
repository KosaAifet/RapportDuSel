<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Connexion</title>
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
      <!-- Connexion -->
      <article class="form_connexion flex-center flex-to-column warp">
        <h1 class="marginY-s" >Connectez-vous</h1>
        <form action="" method="post" class="flex-center wrap">
          <div class="form_connexion_input_email flex-center marginY-xs">
            <input
              id="connexion_email"
              name="email"
              type="email"
              placeholder="Email..."
              required
            />
          </div>

          <div class="form_connexion_bloc_mdp wrap flex-center flex-to-column marginY-xs">
            <div class="flex-center">
              <div class="form_connexion_input_mdp flex-center marginY-xs">
                <input
                  id="connexion_mdp"
                  name="mdp"
                  type="password"
                  placeholder="Mot de passe..."
                  required
                />
              </div>
            </div>
            
            <p class="no-margin flex-end">Mot de passe oublié ?</p>
          </div>

          <div class="form_connexion_valider flex-center wrap marginY-s">
            <input
              id="connexion_valider"
              name="connexion"
              type="submit"
              value="Connexion"
              onclick="userConnexion()"
            />           
            <p class="marginY-s"><a href="inscription.php">Inscrivez-vous</a></p>
          </div>  
        </form>
      </article>

      <!-- Requête connexion -->
      <script>
        function userConnexion()
        {
          const email = document.getElementById("connexion_email").value;
          const mdp = document.getElementById("connexion_mdp").value;
          console.log({email, mdp})
          axios.post('./controller/connexionController.php', {email, mdp}, {headers: {
            "Content-Type": 'multipart/form-data'
          }}).then((resultat)=>{
            console.log(resultat)
          //   let setting = browser.cookies.set(
          //   {userToken: resultat["userToken"]}
          // )
          }).catch(e=>{console.log(e)})
        }
      </script>

    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
