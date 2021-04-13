<?php
$title = "Acteurs du moment";
include_once('./Inc/header.php');

if (isset($_SESSION['recherche'])) {
  $text = str_replace(" ", "+", $_SESSION['recherche']);
} else {
  $text = null;
}
?>
<div class="container my-3">
  <?php
  $donnees = search($text);
  if (sizeof($donnees) == 0) {
  ?>
    <div id="notfound">
      <div class="notfound">
        <div class="notfound-404">
          <h1>Oops!</h1>
          <h2>Aucun résultat pour "<?= $_SESSION['recherche'] ?>"</h2>
        </div>
        <a href="./index.php">Aller à l'accueil</a>
      </div>
    </div>
    <?php
  } else {
    foreach ($donnees as $result) {
      switch (get_class($result)) {
        case "Film":
          if ($result->getPosterPath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2") {
            $poster = "../Style/Images/no-poster.png";
          } else {
            $poster = $result->getPosterPath();
          }
    ?>
          <div class="card mb-3 mx-auto" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= $poster ?>" alt="..." style="width: 150px;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $result->getTitle() ?><span class="badge rounded-pill bg-dark mx-2">Film</span></h5>
                  <p class="card-text"><?= mb_strimwidth($result->getOverview(), 0, 150, "...") ?></p>
                  <a href="./Film.php?idFilm=<?= $result->getId() ?>" class="lien"><button type="button" class="btn btn-dark">Voir plus</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php
          break;
        case "People":
          if ($result->getProfilePath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2") {
            $poster = "../Style/Images/no-poster.png";
          } else {
            $poster = $result->getProfilePath();
          }
        ?>
          <div class="card mb-3 mx-auto" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= $poster ?>" alt="..." style="width: 150px;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $result->getName() ?><span class="badge rounded-pill bg-dark mx-2">People</span></h5>
                  <p class="card-text"><?= mb_strimwidth($result->getBiography(), 0, 150, "...") ?></p>
                  <a href="./Acteur.php?idPeople=<?= $result->getId() ?>" class="lien"><button type="button" class="btn btn-dark">Voir plus</button></a>
                </div>
              </div>
            </div>
          </div>

  <?php
          break;
      }
    }
  }
  ?>
</div>
<?php include_once('./Inc/footer.php');
