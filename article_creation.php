<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Nouvel Article</title>
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
        <article>
          <form id="crea_article" action="" method="post">
            <div> 
              <input
                id="article_titre"
                name="titre"
                type="text"
                placeholder="Titre de l'article"
                required
              />
            </div>
            
            <br />

            <div class="flex-to-row">
              <div class="form_creaArticle_image"> 
                <img
                  id="article_image"
                  src="./images/imagePlaceholder.jpg"
                  alt="Miniature de votre article"
                  height="100%"
                  width="100%"
                />
              </div>
              <div class=""> 
                <h2 for="article_image">La Miniature</h2>
                <p>Importer une image</p>
              </div>
            </div>

            <br />

            <textarea
              id="article_texte"
              name="texte"
              placeholder="Ecrivez votre article"
              required
              class="form_creaArticle_textarea"
            ></textarea>

            <br />

            <div class="flex-end marginY-xs">
              <div class="form_creaArticle_valider"> 
                <input
                  id="article_valider"
                  type="submit"
                  value="Publier"
                  onclick="location.href='articles_communaute.php'"
                />
              </div> 
            </div>                     
          </form>
        </article>
      </section>
    </main>

    <!-- Requête Création d'articles -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('crea_article').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            axios.post('./controller/articleController.php', formData)
                .then(response => alert('Creation d\'article réussie!'))
                .catch(error => alert('Erreur lors de la creation de l\'article: ' + error));
        });
    </script>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
