<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Commentaires</title>
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
    <main role="main">
      <!-- Commentaires -->
      <section>
        <?php require_once __DIR__ . './templates/blocCommentaire.tpl.html';?>
      </section>

      <!-- Barre de pages de résultats -->
      <?php require_once __DIR__ . './templates/barPages.tpl.html';?>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
