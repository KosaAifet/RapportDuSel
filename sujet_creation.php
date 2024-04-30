<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Nouveau Sujet</title>
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
      <!-- Section Sujet-->
      <section>
        <!-- Rédaction Sujet -->
        <article>
          <form action="" method="post">
            <div> 
              <input
                id="sujet_titre"
                type="text"
                placeholder="Titre du sujet"
                required
              />
            </div>

            <br />

            <textarea
              id="sujet_texte"
              placeholder="Ecrivez votre article"
              required
              class="form_creaArticle_textarea"
            ></textarea>

            <br />

            <div class="flex-end marginY-xs">
              <div class="form_creaArticle_valider"> 
                <input
                  id="sujet_valider"
                  type="button"
                  value="Publier"
                  onclick="location.href='sujet.php'"
                />
              </div> 
            </div>  
          </form>
        </article>
      </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
