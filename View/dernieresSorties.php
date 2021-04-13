<?php 
    $title = "Dernières sorties";
    include_once('./Inc/header.php');
?>

<div>
  <h1 class="titre"> Les dernières sorties </h1>
</div>

<div class="container">
  <div class="row row-cols-1 row-cols-md-5 g-5">
    <?php 
    $donnees = lastMovies();
    foreach($donnees as $last){
      if($last->getPosterPath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2"){
        $poster = "../Style/Images/no-poster.png";
      }
      else{
        $poster = $last->getPosterPath();
      }
    ?>
    <div class="col">
      <div class="card  h-100" >
        <img src="<?= $poster ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $last->getTitle() ?></h5>
          <p class="card-text"><?= mb_strimwidth($last->getOverview(), 0, 100, "...") ?></p>
          <a href="./Film.php?idFilm=<?= $last->getId() ?>" class="btn btn-dark ">Voir plus</a>
        </div>
      </div>
    </div>
    <?php 
    }
     ?>
  </div>
</div>

<?php include_once('./Inc/footer.php'); 