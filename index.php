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
      <!-- Dashboard    class="index_section_dashboard flex-center"-->
      <section>
        <!-- <div class="index_dashboard flex-center"><a href="site_presentationSFW.php">-Dashboard-</a></div> -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkT3h2MGQv6TZ9lP9O29NZvB5fP9MndBbPfA&s" class="d-block w-100" alt="red">
            </div>
            <div class="carousel-item">
              <img src="https://t4.ftcdn.net/jpg/02/17/89/41/360_F_217894165_H4jRalQ4eg9Kp8XUVGEa7XFDEPtTQ9PY.jpg" class="d-block w-100" alt="blue">
            </div>
            <div class="carousel-item">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-Q34paBAORnzaAl3dbhZP-zgrRWDR_-NyiQ&s" class="d-block w-100" alt="green">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <!-- Derniers Rapports -->
      <div class="container">
        <h3 class="marginX-s">Derniers Rapports</h3>
        <div id="bloc_rapports" class="row">
         
        </div>
      </div>

      <!-- Dernières "Critiques" -->
      <div class="container">
        <h3 class="marginX-s">Dernières "Critiques"</h3>
        <div id="bloc_critiques" class="row">
         
        </div>
      </div>

      <!-- Dernières "News" -->
      <div class="container">
        <h3 class="marginX-s">Dernières "News"</h3>
        <div id="bloc_news" class="row">
         
        </div>
      </div>

      <!-- Derniers Rapports de la communauté -->
      <div class="container">
        <h3 class="marginX-s">Derniers Rapports de la communauté</h3>
        <div id="bloc_articles" class="row">
         
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script> 
      $(document).ready(function()
      {
        axios.get('./controller/acceuilController.php', 
        {headers:{'Authorization': 'Bearer ' + localStorage.getItem('jwt')}})
        .then(response => {
          console.log(response)

          let rapports_cards = "";
          $.each(response.data.data.rapports, (i, article)=>{
          rapports_cards += generateCard('https://photos.onedrive.com/share/1B4175BBF5C6400E!2973?cid=1B4175BBF5C6400E&resId=1B4175BBF5C6400E!2973&authkey=!AH-A4GVkgvVSIVk&ithint=photo&e=gY5vNU', article.titre, article.texte, article.nom, article.id)
          })
          document.getElementById("bloc_rapports").innerHTML = rapports_cards;

          let critiques_cards = "";
          $.each(response.data.data.critiques, (i, article)=>{
          critiques_cards += generateCard('https://photos.onedrive.com/share/1B4175BBF5C6400E!2973?cid=1B4175BBF5C6400E&resId=1B4175BBF5C6400E!2973&authkey=!AH-A4GVkgvVSIVk&ithint=photo&e=gY5vNU', article.titre, article.texte, article.nom, article.id)
          })
          document.getElementById("bloc_critiques").innerHTML = critiques_cards;

          let news_cards = "";
          $.each(response.data.data.news, (i, article)=>{
          news_cards += generateCard('https://photos.onedrive.com/share/1B4175BBF5C6400E!2973?cid=1B4175BBF5C6400E&resId=1B4175BBF5C6400E!2973&authkey=!AH-A4GVkgvVSIVk&ithint=photo&e=gY5vNU', article.titre, article.texte, article.nom, article.id)
          })
          document.getElementById("bloc_news").innerHTML = news_cards;

          let articles_cards = "";
          $.each(response.data.data.articles, (i, article)=>{
          articles_cards += generateCard('https://photos.onedrive.com/share/1B4175BBF5C6400E!2973?cid=1B4175BBF5C6400E&resId=1B4175BBF5C6400E!2973&authkey=!AH-A4GVkgvVSIVk&ithint=photo&e=gY5vNU', article.titre, article.texte, article.nom, article.id)
          })
          document.getElementById("bloc_articles").innerHTML = articles_cards;
        })
        .catch(e => console.log(e));
      }) 
    </script>

    <script>
      function generateCard(img_url, title, text, author, id) {
        const template = `
        <div class="col-sm-3 mb-3 mb-sm-0">
          <div class="card text-center mb-3" style="width: 16rem;">
            <div class="card-body">
              <h5 class="card-title">${title}</h5>
              <p class="card-text">${text}</p>
              <a href="article.php?id=${id}" class="btn btn-primary">Voir l'article</a>
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
