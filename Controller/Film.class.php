<?php
    class Film
    {
        private $id;
        private $title;
        private $overview;
        private $popularity;
        private $posterPath;
        private $releaseDate;
        private $voteAverage;
        private $voteCount;

        // ----- Constructeur ----- //

        function __construct($donnees)
        {
            $this->hydrate($donnees);
        }

        // ----- Hydrate ----- //

        public function hydrate(array $donnees)
        {

            foreach ($donnees as $key => $value) // Chaque champ est lu
            {
                // On récupère le nom du setter correspondant à l'attribut de la classe.
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
                if (method_exists($this, $method))
                {
                    // On appelle le setter.
                    $this->$method($value);
                }
            }
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of overview
         */ 
        public function getOverview()
        {
                return $this->overview;
        }

        /**
         * Set the value of overview
         *
         * @return  self
         */ 
        public function setOverview($overview)
        {
                $this->overview = $overview;

                return $this;
        }

        /**
         * Get the value of popularity
         */ 
        public function getPopularity()
        {
                return $this->popularity;
        }

        /**
         * Set the value of popularity
         *
         * @return  self
         */ 
        public function setPopularity($popularity)
        {
                $this->popularity = $popularity;

                return $this;
        }

        /**
         * Get the value of posterPath
         */ 
        public function getPosterPath()
        {
                return $this->posterPath;
        }

        /**
         * Set the value of posterPath
         *
         * @return  self
         */ 
        public function setPosterPath($posterPath)
        {
                $this->posterPath = "https://www.themoviedb.org/t/p/w600_and_h900_bestv2".$posterPath;

                return $this;
        }

        /**
         * Get the value of releaseDate
         */ 
        public function getReleaseDate()
        {
                return $this->releaseDate;
        }

        /**
         * Set the value of releaseDate
         *
         * @return  self
         */ 
        public function setReleaseDate($releaseDate)
        {
                $this->releaseDate = $releaseDate;

                return $this;
        }

        /**
         * Get the value of voteAverage
         */ 
        public function getVoteAverage()
        {
                return $this->voteAverage;
        }

        /**
         * Set the value of voteAverage
         *
         * @return  self
         */ 
        public function setVoteAverage($voteAverage)
        {
                $this->voteAverage = $voteAverage;

                return $this;
        }

        /**
         * Get the value of voteCount
         */ 
        public function getVoteCount()
        {
                return $this->voteCount;
        }

        /**
         * Set the value of voteCount
         *
         * @return  self
         */ 
        public function setVoteCount($voteCount)
        {
                $this->voteCount = $voteCount;

                return $this;
        }
    }
?>