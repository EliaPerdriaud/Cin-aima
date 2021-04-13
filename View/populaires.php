<?php 
    $title = "Plus populaires";
    include_once('./Inc/header.php');
?>

<div>
  <h1 class="titre"> Films les plus populaires </h1>
</div>

<div class="container">
<div class="row row-cols-1 row-cols-md-1 g-4 mt-1">
    <?php 
    $donnees = popularMovies();
    $nb = 1;
    foreach($donnees as $popular){
      if($popular->getPosterPath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2"){
        $poster = "../Style/Images/no-poster.png";
      }
      else{
        $poster = $popular->getPosterPath();
      }

    ?>
    <div class="col">
        <div class="card mb-3  ms-auto me-auto">
            <div class="row g-0">
                <div class="d-flex justify-content-between col-md-4 px-5 mx-auto">
                    <div class="number"><span class="my-5"><?= $nb ?></span></div>
                    <div class=""><a href="./Film.php?idFilm=<?= $popular->getId() ?>" class="lien" ><img src="<?= $poster ?>" alt="poster" width="150px" class="mx-auto d-block"></a></div>
                    <div></div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="./Film.php?idFilm=<?= $popular->getId() ?>" class="lien" ><h5 class="card-title"><?= $popular->getTitle() ?></a> <span class="badge rounded-pill bg-dark"><?= $popular->getVoteAverage() ?>/10</span></h5>
                        <p class="card-text"><?= $popular->getOverview() ?></p>
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