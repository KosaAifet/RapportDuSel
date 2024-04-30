<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Profile User</title>
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
      <!-- Profile -->
      <section class="wrap marginY-s">
        <div class="profile_bloc flex-spaceBetween">
          <div>
            <img
              src="./images/avatarPlaceholder.jpg"
              alt="Avatar de user"
              height="100%"
              width="100%"
            />
          </div>

          <div class="profile_bloc_texte">
            <div class="flex-to-row flex-start flex-align-baseline">
              <h1>Pseudo</h1>
              <div class="marginX-xs"><h3>(Grade)</h3></div>
            </div>
            
            <p>Genre</p>
            <p>Age</p>
          </div>
        </div>
        
        <div class="profile_apropos marginY-xs"> 
          <h2>A propos de moi</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
            culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <span class="flex-end"> 
            <button onclick="location.href='profile_modification.php'" type="button">Modifier profile</button>
          </span>
        </div>
      </section>

      <hr class="bar_separation flex-center" />
      

      <!-- Derniers Articles -->
      <section class="marginY-s">
        <h3 class="marginX-s">Derniers Articles</h3>
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
