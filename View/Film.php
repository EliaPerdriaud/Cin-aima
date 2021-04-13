<?php 
    $title = "Film";
    include_once('./Inc/header.php');

    if(isset($_GET['idFilm'])){
        $id = $_GET['idFilm'];
        $film = detailsMovies($id);
        if($film->getPosterPath() == "https://www.themoviedb.org/t/p/w600_and_h900_bestv2"){
            $poster = "../Style/Images/no-poster.png";
          }
          else{
            $poster = $film->getPosterPath();
          }
    }
    else{
        $id = null;
        $film = null;
        $poster = "../Style/Images/no-poster.png";
    }
?>

    <div class="description">
        <div class="poster">
            <img src="<?= $poster ?>" class="image" alt="" />
        </div>

        <div class="synopsis">
            <h2><?= $film->getTitle() ?></h2>
            <br>
            <p><?= $film->getOverview() ?></p>
            
        </div>

        <div class="details">
            <div class="text-details">
                <h4>DATE DE SORTIE </h4>
                <p><?= $film->getReleaseDate() ?></p>
                <br>
                <h4>NOTE</h4>
                <p><?= $film->getVoteAverage() ?>/10 <span> <?= $film->getVoteCount() ?> Votes</span></p>
                <br>
                <h4>POPULARITE</h4>
                <p><?= $film->getPopularity() ?></p>
            </div>
        </div>
    </div>  



<?php include_once('./Inc/footer.php'); 