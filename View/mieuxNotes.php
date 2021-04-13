<?php 
    $title = "Mieux notés";
    include_once('./Inc/header.php');
?>

<div>
  <h1 class="titre"> Films les mieux notés </h1>
</div>

<div class="container">
<div class="row row-cols-1 row-cols-md-1 g-4 mt-1">
    <?php 
    $donnees = topMovies();
    $nb = 1;
    foreach($donnees as $top){
      if($top->getPosterPath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2"){
        $poster = "../Style/Images/no-poster.png";
      }
      else{
        $poster = $top->getPosterPath();
      }

    ?>
    <div class="col">
        <div class="card mb-3  ms-auto me-auto">
            <div class="row g-0">
                <div class="d-flex justify-content-between col-md-4 px-5 mx-auto">
                    <div class="number"><span class="my-5"><?= $nb ?></span></div>
                    <div class=""><a href="./Film.php?idFilm=<?= $top->getId() ?>" class="lien" ><img src="<?= $poster ?>" alt="poster" width="150px" class="mx-auto d-block"></a></div>
                    <div></div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="./Film.php?idFilm=<?= $top->getId() ?>" class="lien" ><h5 class="card-title"><?= $top->getTitle() ?></a> <span class="badge rounded-pill bg-dark"><?= $top->getVoteAverage() ?>/10</span><small class="mx-2 votes"><?= $top->getVoteCount() ?> votes</small></h5>
                        <p class="card-text"><?= $top->getOverview() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $nb++;
    }
     ?>
  </div>
</div>

<?php include_once('./Inc/footer.php'); 