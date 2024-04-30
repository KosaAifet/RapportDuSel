<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Page Produit</title>
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
      <section>
        <!-- Article -->
        <article class="flex-to-row">
          <div class="produit_image">
            <img
              src="./images/imagePlaceholder.jpg"
              alt="Miniature de l'article"
              height="100%"
              width="100%"
            />
          </div>

          <div class="produit_texte flex-to-column"> 
            <div class="flex-to-column marginY-s">
              <h1 class="produit_titre">Titre</h1>

              <div class="perfect_row flex-spaceBetween">
                <div> 
                  <h3>-Prix-</h3>
                </div>

                <div>
                  <p>Quantité <span>-Quantité-</span></p> 
                </div>   
              </div>

              <div class="produit_bouton"> 
                <button class="produit_bouton">Ajouter au panier</button>
              </div>
              
            </div>

            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud 
                exercitation ullamco laboris nisi ut aliquip ex ea 
                commodo consequat. Duis aute irure dolor in 
                reprehenderit in voluptate velit esse cillum dolore eu 
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
                non proident, sunt in culpa qui officia deserunt mollit 
                anim id est laborum.
              </p>
            </div>
          </div>
          
        </article>
      </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
