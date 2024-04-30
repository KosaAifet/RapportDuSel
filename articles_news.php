<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - News</title>
  </head>

  <!-- Type pour les News -->

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
      <!-- Filtres -->
      <section>
        <div class="flex-spaceAround">
          <p>Les plus récents</p>
          <p>Les moins récents</p>
          <p>Les plus appréciés</p>
          <p>Les moins appréciés</p>
        </div>

        <div class="flex-spaceAround">
          <p>Toutes les news</p>
          <p>News du site</p>
          <p>News jeux vidéos</p>
          <p>News divers</p>
        </div>
      </section>

      <!-- Articles -->
      <div class="w-90">
        <p class="nbResultat">-Nombre de résultat-</p>
      </div>
      
      <section>
        <?php require_once __DIR__ . './templates/blocArticle.tpl.html';?>    
      </section>

      <!-- Barre de pages de résultats -->
      <?php require_once __DIR__ . './templates/barPages.tpl.html';?>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
