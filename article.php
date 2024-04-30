<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Article</title>
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
      <!-- Section Article-->
      <section class="">
        <!-- Article -->
        <article class="">
          <div class="flex-to-column marginY-xs">
            <div class="flex-center"> 
              <h1 class="no-margin">Titre</h1>
            </div>
            
            <div class="flex-center"> 
              <h3>Nom Auteur</h3>
            </div> 
          </div>

          <div class="">
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
          </div>

          <div class="perfect_row marginY-s">
            <div class="perfect_row flex-start marginX-xs w-70">
              <div><p>Article ecrit par <a href="public_profile.php">Auteur</a></p></div>
              <div class="icon marginX-xs">
                <img
                  src="./images/avatarPlaceholder.jpg"
                  alt="Avatar de l'auteur"
                  height="100%"
                  width="100%"
                />
              </div>
            </div>

            <!-- Like et Dislike -->
            <div class="perfect_row flex-spaceAround w-30">
              <div class="perfect_row w-40">
                <div class="icon marginX-s">
                  <img
                    src="./images/like.png"
                    alt="like"
                    height="100%"
                    width="100%"
                  />
                </div>               
                <div class="marginX-s"><p>-n likes-</p></div>                
              </div>

              <div class="perfect_row w-40">
                <div class="icon marginX-s">
                  <img
                    src="./images/dislike.png"
                    alt="dislike"
                    height="100%"
                    width="100%"
                  />
                </div> 
                <div class="marginX-s"><p>-n dislikes-</p></div>
              </div>
            </div>
          </div>
          
        </article>
      </section>

      <!-- Section Commentaires -->
      <section>
        <h2>Commentaires</h2>
        <!-- Commentaire -->
        <?php require_once __DIR__ . './templates/blocCommentaireV2.tpl.html';?>

        <div class="marginY-s"> 
          <button onclick="location.href='redac_reponse.php'" type="button">+ Ajouter un Commentaire</button>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
