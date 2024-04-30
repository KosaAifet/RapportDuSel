<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Modification Profile User</title>
  </head>

  <!-- Body -->
  <body>
    <!-- Header -->
    <header>
      <!-- Header Principal -->
      <?php require_once __DIR__ . './templates/mainHeader.tpl.html';?>

      <!-- Navigation Principale -->
      <?php require_once __DIR__ . './templates/mainNav.tpl.html';?>

      <!-- Navigation espace Profile -->
      <?php require_once __DIR__ . './templates/profileNav.tpl.html';?>
    </header>

    <!-- Main -->
    <main class="flex-center" role="main">
      <!-- Profile -->
      <section>
        <form action="" method="post">

          <div class="flex-to-row w-100 marginY-s"> 
            <div class="flex-to-column flex-align-center flex-end w-20"> 
              <img
                src="./images/avatarPlaceholder.jpg"
                alt="Avatar de votre profile"
                height="120rem"
                width="120rem"
              />
              <p>Modification de l'image</p>
            </div>
            
            <div class="flex-to-column w-80"> 
              <div class="flex-to-row flex-align-baseline"> 
                <h2>Pseudo</h2>
                <span class="marginX-xs">-Modification Pseudo-</span>
              </div>

              <div class="flex-to-row flex-align-baseline"> 
                <h3>Grade</h3>
                <div class="form_modifP_checkbox marginX-xs"> 
                  <input class="form_modifP_checkbox_input" id="profile_grade" type="checkbox" />
                  <label class="text-size-s" for="profile_grade">Mettre le grade en privé</label>
                </div> 
              </div>

              <div class="flex-to-row"> 
                <p>Changer le mot de passe</p>
              </div>
            </div>
          </div>

          <div> 
            <div class="flex-to-row form_modifP_area"> 
              <h3 class="form_modifP_label">Nom</h3>
              <input class="w-40" id="profile_nom " type="text" placeholder="Nom" required />
            </div>
            
            <div class="flex-to-row form_modifP_area"> 
              <h3 class="form_modifP_label">Prenom</h3>
              <input class="w-40" id="profile_prenom" type="text" placeholder="Prenom" required />
            </div>

            <div class="flex-to-row form_modifP_area"> 
              <h3 class="form_modifP_label">Email</h3>
              <input class="w-40" id="profile_email" type="email" placeholder="Email" required />
            </div>
            
            <div class="flex-to-row form_modifP_area"> 
              <h3 class="form_modifP_label">Date de naissance</h3>
              <input class="w-40" id="profile_ddn" type="date" placeholder="Date de naissance" required />
              <div class="form_modifP_checkbox marginX-xs"> 
                <input class="form_modifP_checkbox_input" id="profile_privateage" type="checkbox" />
                <label class="text-size-s" for="profile_privateage">Mettre l'age en privé</label>
              </div>
            </div>
            
            <div class="flex-to-row form_modifP_area"> 
              <h3 class="form_modifP_label">Genre</h3>
              <select class="w-40" name="genre" id="profile_genre">
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Autre">Autre</option>
              </select>
              <div class="form_modifP_checkbox marginX-xs">
                <input class="form_modifP_checkbox_input" id="profile_privategenre" type="checkbox" />
                <label class="text-size-s" for="profile_privategenre">Mettre le genre en privé</label>
              </div>
            </div>
          </div>

          <div> 
            <div class="marginY-s"> 
              <h2>A propos de moi</h2>
              <textarea class="form_modifP_textarea" id="profile_apropos" placeholder="A propos de moi"></textarea>
            </div>
            
            <div class="flex-end"> 
              <div class="form_modifP_valider flex-end"> 
                <input id="profile_valider" type="button" value="Valider les modifications" onclick="location.href='profile.php'" />
              </div>
            </div>
            
          </div>
        </form>
      </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
