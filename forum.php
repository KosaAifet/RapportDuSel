<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Forum</title>
  </head>

  <!-- Body -->
  <body>
    <!-- Header -->
    <header>
      <!-- Header Principal -->
      <?php require_once __DIR__ . './templates/mainHeader.tpl.html';?>

      <!-- Navigation Principale -->
      <?php require_once __DIR__ . './templates/mainNav.tpl.html';?>

      <!-- Navigation espace communautaire -->
      <?php require_once __DIR__ . './templates/communauteNav.tpl.html';?>
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


        <div class="flex-center"> 
          <div class="w-90 flex-spaceAround"> 
            <div class="w-60 flex-end">-Barre de Recherche-</div>

            <div class="w-40 flex-end"> 
              <button onclick="location.href='sujet_creation.php'" type="button">Nouveau sujet</button>
            </div>
          </div>
        </div>
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
