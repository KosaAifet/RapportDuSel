<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Nouvel Réponse</title>
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
      <!-- Section Réponse-->
      <section>
        <!-- Rédaction réponse -->
        <article>
          <form action="" method="post">
            <textarea
              id="redac_texte"
              placeholder="Ecrivez votre réponse"
              required
              class="form_creaArticle_textarea"
            ></textarea>

            <div class="flex-end marginY-xs">
              <div class="form_creaArticle_valider">
                <input id="redac_valider" type="button" value="Publier" />
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
