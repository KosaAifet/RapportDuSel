<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Rapports de la Communauté</title>
  </head>

  <!-- Type pour les Rapports de la communauté -->

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
          <p>Les plus appréciés</p>
          <p>Les moins appréciés</p>
        </div>

        <div class="flex-center marginY-xs">-Barre de Recherche-</div>
      </section>

      <!-- Articles -->
      <div class="w-90">
        <p class="nbResultat">-Nombre de résultat-</p>
      </div>
      
      <section id="bloc_articles">

      </section>

      <!-- Barre de pages de résultats -->
      <?php require_once __DIR__ . './templates/barPages.tpl.html';?>
    </main>

    <!-- Scripts -->
    <script> 
      $(document).ready(function()
      {
        axios.get('./controller/articleController.php', 
        {
          headers:{'Authorization': 'Bearer ' + localStorage.getItem('jwt')},
          params: {all:true}
        })
        .then(response => {
          console.log(response)
          let cards = "";
          $.each(response.data.data.articles, (i, article)=>{
          cards += generateCard('https://photos.onedrive.com/share/1B4175BBF5C6400E!2973?cid=1B4175BBF5C6400E&resId=1B4175BBF5C6400E!2973&authkey=!AH-A4GVkgvVSIVk&ithint=photo&e=gY5vNU', article.titre, article.texte, article.pseudo, article.id)
          })
          document.getElementById("bloc_articles").innerHTML = cards;
        })
        .catch(e => console.log(e));
      }) 
    </script>

    <script>
      function generateCard(img_url, title, text, author, id) {
        const template = `
        <div class='card mb-3' style='max-width: 540px;'>
            <div class='row g-0'>
                <div class='col-md-4'>
                    <img src='${img_url}' class='img-fluid rounded-start' alt='Image'>
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                        <a href='article.php?id=${id}'><h5 class='card-title'>${title}</h5><a/>
                        <p class='card-text'>${text}</p>
                        <a href='public_profile.php' class='card-text'><small class='text-body-secondary'>${author}</small></a>
                    </div>
                </div>
            </div>
        </div>
        `;

        return template;
      }
    </script>

    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
