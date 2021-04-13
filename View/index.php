<?php 
    $title = "Accueil";
    include_once('./Inc/header.php');
?>

<section class="fond">
  <header class="fond-header">
    <h1 class="fond-title">Cin'aima</h1>
  </header>
</section>

<br>
<section class="container">
  <div>
    <h1 class="titre"> Dernières sorties </h1>
  </div>
  <br>
  <div class="row row-cols-1 row-cols-md-6 g-6">
    <?php  
    $donnees = lastMovies();
    $count = 1;
    foreach($donnees as $last){
      if($last->getPosterPath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2"){
        $poster = "../Style/Images/no-poster.png";
      }
      else{
        $poster = $last->getPosterPath();
      }
    ?>
    <div class="col-sm-6">
      <div class="card  h-100" >
        <img src="<?= $poster ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $last->getTitle() ?></h5>
          <a href="./Film.php?idFilm=<?= $last->getId() ?>" class="stretched-link"></a>
        </div>
      </div>
    </div>
    <?php 
    $count++;
    if($count > 6) break;
    }
    ?>
  </div>
</section>
<br>
<section class="container">
  <div>
    <h1 class="titre">Acteurs du moment</h1>
  </div>
  <br>
  <div class="row row-cols-1 row-cols-md-6 g-6">
    <?php 
      $donnees = popularPeople();
      $count = 1;
      foreach($donnees as $people){
      if($people->getProfilePath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2"){
          $profile = "../Style/Images/no-poster.png";
      }
      else{
          $profile = $people->getProfilePath();
      }
    ?>
    <div class="col-sm-6">
      <div class="card  h-100" >
        <img src="<?= $profile ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $people->getName() ?></h5>
          <a href="./Acteur.php?idPeople=<?= $people->getId() ?>" class="stretched-link"></a>
        </div>
      </div>
    </div>
    <?php 
      $count++;
      if($count > 6) break;
      }
    ?>
  </div>
</section>

<?php include_once('./Inc/footer.php'); 