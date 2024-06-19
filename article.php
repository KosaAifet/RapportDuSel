<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <?php require_once __DIR__ . './templates/mainStyles.tpl.html';?>

    <!-- Packages -->
    <?php require_once __DIR__ . './templates/mainPackages.tpl.php';?>

    <title>Les Rapports du Sel - Article</title>
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
      <section class="">
        <!-- Article -->
        <article class="">
          <div class="flex-to-column marginY-xs">
            <div class="flex-center"> 
              <h1 id="titre" class="no-margin">Titre</h1>
            </div>
            
            <div class="flex-center"> 
              <h3 id="auteur">Nom Auteur</h3>
            </div> 
          </div>

          <div id="texte" class="">
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
            <P>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
              est laborum.
            </P>
          </div>

          <div class="perfect_row marginY-s">
            <div class="perfect_row flex-start marginX-xs w-70">
              <div><p>Article ecrit par <a id="auteurLink" href="public_profile.php"></a></p></div>
              <div class="icon marginX-xs">
                <img
                  src="./images/avatarPlaceholder.jpg"
                  alt="Avatar de l'auteur"
                  height="100%"
                  width="100%"
                />
              </div>
            </div>

            <!-- Like et Dislike -->
            <div class="perfect_row flex-spaceAround w-30">
              <div class="row">
                <button onclick="postlike('article', true)" type="button" class="btn">
                  <i class="fa-regular fa-thumbs-up fa-2xl"></i> <span>2</span>
                </button>             
              </div> 

              <div class="row">
                <button type="button" class="btn">
                  <i class="fa-regular fa-thumbs-down fa-2xl"></i> <span>2</span>
                </button>             
              </div> 
            </div>
          </div>
          
        </article>
      </section>

      <!-- Section Commentaires -->
      <section>
        <h2>Commentaires</h2>
        <!-- Commentaire -->
        <?php require_once __DIR__ . './templates/blocCommentaireV2.tpl.html';?>

        <div class="marginY-s"> 
          <button onclick="location.href='redac_reponse.php'" type="button">+ Ajouter un Commentaire</button>
        </div>
      </section>
    </main>

    <!-- Scripts -->
    <script>
      $(document).ready(function()
      {
        const params = new URLSearchParams(window.location.search);
        axios.get('./controller/articleController.php', 
        {
          headers:{'Authorization': 'Bearer ' + localStorage.getItem('jwt')}, 
          params: {id: params.get('id')}
        })
        .then(response => 
        {
          console.log(response.data.article)
          const article = response.data.article[0];
          const titre = article.titre;
          const texte = article.texte;
          const auteur = article.pseudo;

          document.getElementById("titre").innerText = titre;
          document.getElementById("texte").innerText = texte;
          document.getElementById("auteur").innerText = auteur;
          document.getElementById("auteurLink").innerText = auteur;
        })
        .catch(e => console.log(e));
      }) 
    </script>
  <script>ite
    function postLike(liked_on, value){
       const params = new URLSearchParams(window.location.search);
      axios.post('./controller/likeController.php', 
        {
          headers:{'Authorization': 'Bearer ' + localStorage.getItem('jwt')}, 
          data: {liked_on, value, entite_id: params.id}
        })
        .then(response => 
        {

        }
    }
  </script>
    <!-- Footer -->
    <?php require_once __DIR__ . './templates/footer.tpl.html';?>
  </body>
</html>
