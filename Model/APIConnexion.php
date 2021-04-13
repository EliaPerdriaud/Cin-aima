<?php

function callAPI ($url) {

	$raw = @file_get_contents($url);	
	$json = json_decode($raw);

    return $json;
}

function lastMovies (){
    $url = "https://api.themoviedb.org/3/discover/movie?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR&sort_by=primary_release_date.desc&include_adult=false&page=1&primary_release_date.lte=".date("Y-m-d", time());
    $json = callAPI($url);
    
    if(!empty($json->results)) {
		$films = array();
		foreach($json->results as $film) {
			$films[] = new Film([
				'id' => $film->id,
				'title' => $film->title,
				'overview' => $film->overview,
				'popularity' => $film->popularity,
				'posterPath' =>$film->poster_path,
				'releaseDate' => $film->release_date,
				'voteAverage' => $film->vote_average,
				'voteCount' => $film->vote_count
			]);
		}
	}
	return $films;
}

function popularMovies (){
    $url = "https://api.themoviedb.org/3/movie/popular?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR&page=1";
    $json = callAPI($url);
    
    if(!empty($json->results)) {
		$films = array();
		foreach($json->results as $film) {
			$films[] = new Film([
				'id' => $film->id,
				'title' => $film->title,
				'overview' => $film->overview,
				'popularity' => $film->popularity,
				'posterPath' =>$film->poster_path,
				'releaseDate' => $film->release_date,
				'voteAverage' => $film->vote_average,
				'voteCount' => $film->vote_count
			]);
		}
	}
	return $films;
}

function topMovies (){
    $url = "https://api.themoviedb.org/3/movie/top_rated?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR&page=1";
    $json = callAPI($url);
    
    if(!empty($json->results)) {
		$films = array();
		foreach($json->results as $film) {
			$films[] = new Film([
				'id' => $film->id,
				'title' => $film->title,
				'overview' => $film->overview,
				'popularity' => $film->popularity,
				'posterPath' =>$film->poster_path,
				'releaseDate' => $film->release_date,
				'voteAverage' => $film->vote_average,
				'voteCount' => $film->vote_count
			]);
		}
	}
	return $films;
}

function detailsMovies ($idFilm){
    $url = "https://api.themoviedb.org/3/movie/".$idFilm."?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR";
	
	$json = callAPI($url);

    if($json != null) {
		$film = $json;
		$result = new Film([
			'id' => $film->id,
			'title' => $film->title,
			'overview' => $film->overview,
			'popularity' => $film->popularity,
			'posterPath' =>$film->poster_path,
			'releaseDate' => $film->release_date,
			'voteAverage' => $film->vote_average,
			'voteCount' => $film->vote_count
		]);
	}else{
		$result = null;
	}
	return $result;
}

function search($search){
    $url = "https://api.themoviedb.org/3/search/multi?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR&query=".$search."&page=1&include_adult=false";
    $json = callAPI($url);
	$resultats = array();
    if(!empty($json->results)) {
		foreach($json->results as $rsl) {
			switch($rsl->media_type){
				case 'movie':
					$resultats[] = new Film([
						'id' => $rsl->id,
						'title' => $rsl->title,
						'overview' => $rsl->overview,
						'popularity' => $rsl->popularity,
						'posterPath' =>$rsl->poster_path,
						'releaseDate' => @$rsl->release_date,
						'voteAverage' => $rsl->vote_average,
						'voteCount' => $rsl->vote_count
					]);
					break;
				case 'person':
					$resultats[] = detailsPeople($rsl->id);
				default:
					break;
			};
		}
	}
	return $resultats;
}

function moviePeople($idPeople){
	$url = "https://api.themoviedb.org/3/person/".$idPeople."/movie_credits?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR";
    $json = callAPI($url);
	$films = array();
	if(!empty($json->cast)) {
		
		foreach($json->cast as $film) {
			$films[] = new Film([
				'id' => $film->id,
				'title' => $film->title,
				'overview' => $film->overview,
				'popularity' => $film->popularity,
				'posterPath' =>$film->poster_path,
				'releaseDate' => @$film->release_date,
				'voteAverage' => $film->vote_average,
				'voteCount' => $film->vote_count
			]);
		}

	}
	return $films;
}

function detailsPeople($idPeople){
    $url = "https://api.themoviedb.org/3/person/".$idPeople."?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR";
    $json = callAPI($url);
    if($json != null) {
		$people = $json;
		$result = new People([
			'id' => $people->id,
			'name' => $people->name,
			'gender' => $people->gender,
			'birthday' => $people->birthday,
			'deathday' =>$people->deathday,
			'placeOfBirth' => $people->place_of_birth,
			'popularity' => $people->popularity,
			'biography' => $people->biography,
			'profilePath' => $people->profile_path ,
			'knownForDepartment' => $people->known_for_department,
			'tabMovie' => moviePeople($idPeople)
		]);
	}else{
		$result = null;
	}
	return $result;
}



function popularPeople(){
    $url = "https://api.themoviedb.org/3/person/popular?api_key=c089fd2b88cef45383ff5957ae6533ed&language=fr-FR&page=1";
    $json = callAPI($url);
    if(!empty($json->results)) {
		$peoples = array();
		foreach($json->results as $people) {
			$peoples[] = detailsPeople($people->id);
		}
	}
	return $peoples;
}

