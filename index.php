<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Accueil</title>
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
      <!-- Dashboard-->
      <section class="index_section_dashboard flex-center">
        <div class="index_dashboard flex-center"><a href="site_presentationSFW.php">-Dashboard-</a></div>
      </section>

      <!-- Derniers Rapports -->
      <section class="marginY-m">
        <h3 class="marginX-s">Derniers Rapports</h3>
        <div class="flex-spaceAround">
          <article class="petitBloc">
            <span>-Article 1-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 2-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 3-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 4-</span>
          </article>
        </div>
      </section>

      <!-- Dernières "Critiques" -->
      <section class="marginY-m">
        <h3 class="marginX-s">Dernières "Critiques"</h3>
        <div class="flex-spaceAround">
          <article class="petitBloc">
            <span>-Article 1-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 2-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 3-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 4-</span>
          </article>
        </div>
      </section>

      <!-- Dernières "News" -->
      <section class="marginY-m">
        <h3 class="marginX-s">Dernières "News"</h3>
        <div class="flex-spaceAround">
          <article class="petitBloc">
            <span>-Article 1-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 2-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 3-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 4-</span>
          </article>
        </div>
      </section>

      <!-- Derniers Rapports de la communauté -->
      <section class="marginY-m">
        <h3 class="marginX-s">Derniers Rapports de la communauté</h3>
        <div class="flex-spaceAround">
          <article class="petitBloc">
            <span>-Article 1-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 2-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 3-</span>
          </article>

          <article class="petitBloc">
            <span>-Article 4-</span>
          </article>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
