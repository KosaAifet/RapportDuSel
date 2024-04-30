<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Mon Panier</title>
  </head>

  <!-- Type pour les Rapports écrits par le user -->

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
      <!-- Articles -->
      <section>
        <div>
          <h1>Votre Panier</h1>
        </div>

        <?php require_once __DIR__ . './templates/blocProduitPanier.tpl.html';?>

        <div class="flex-spaceBetween flex-align-center marginY-s">
          <div> 
            <h2>-Prix totale-</h2>
          </div>
          
          <div> 
            <button>Passer Commande</button>
          </div> 
        </div>
      </section>

      <!-- Barre de pages de résultats -->
      <?php require_once __DIR__ . './templates/barPages.tpl.html';?>
    </main>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
