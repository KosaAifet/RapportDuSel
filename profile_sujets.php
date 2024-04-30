<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Mes Sujets</title>
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
      <!-- Filtres -->
      <section>
        <div class="flex-spaceAround">
          <p>Les plus récents</p>
          <p>Les moins récents</p>
          <p>Sujets ouverts</p>
          <p>Sujets clos</p>
        </div>

        <div class="flex-center marginY-xs">-Barre de Recherche-</div>
      </section>

      <!-- Articles -->
      <div class="w-90">
        <p class="nbResultat">-Nombre de résultat-</p>
      </div>

      <section>
        <div class="forum_legend">
          <div class="sujetBloc_image"></div>
          <p class="w-50">Sujet</p>
          <p class="w-10">Auteur</p>
          <p class="w-10">Réponses</p>
          <p class="w-10">Date</p>
        </div>

        <?php require_once __DIR__ . './templates/blocSujet.tpl.html';?>
      </section>

      <!-- Barre de pages de résultats -->
      <?php require_once __DIR__ . './templates/barPages.tpl.html';?>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
