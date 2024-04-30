<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Sujet Forum</title>
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
      <!-- Section Discussion -->
      <section>
        <!-- Sujet -->
        <article>
          <div>
            <div class="perfect_row">
              <div class="w-80"><h1>Intitulé Sujet</h1></div> 
              <div class="flex-end w-20">
                <p>-Date publication-</p>
              </div>
            </div>

            <article class="sujet_post_bloc">
              <div>
                <div class="perfect_row">
                  <div class="sujet_avatar">
                    <img
                      src="./images/avatarPlaceholder.jpg"
                      alt="Avatar de user"
                      height="100%"
                      width="100%"
                    />
                  </div>

                  <div class="marginX-xs"><p><a href="public_profile.php">Pseudo</a></p></div>
                </div> 
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                  veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                  cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                  est laborum.
                </p>
              </div>

              <div class="flex-end marginY-s">
                <div class="sujet_repondre"> 
                  <button onclick="location.href='redac_reponse.php'" type="button">
                    Répondre
                  </button>
                </div>
              </div>
            </article>
          </div>

          <!-- Réponses -->
          <section>
            <?php require_once __DIR__ . './templates/blocSujetPost.tpl.html';?>
          </section>
        </article>

        <!-- Barre de pages de résultats -->
        <?php require_once __DIR__ . './templates/barPages.tpl.html';?>
      </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
