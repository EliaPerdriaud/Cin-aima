<?php
    class People
    {
        private $id;
        private $name;
        private $gender;
        private $birthday;
        private $deathday;
        private $placeOfBirth;
        private $popularity;
        private $biography;
        private $profilePath;
        private $knownForDepartment;
        private $tabMovie;
    
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
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of gender
         */ 
        public function getGender()
        {
                return $this->gender;
        }

        /**
         * Set the value of gender
         *
         * @return  self
         */ 
        public function setGender($gender)
        {
                switch($gender){
                    case 1: 
                        $this->gender = "Femme";
                        break;

                    case 2:
                        $this->gender = "Homme";
                        break;

                    default:
                        $this->gender = null;
                        break;
                }
                
                return $this;
        }

        /**
         * Get the value of birthday
         */ 
        public function getBirthday()
        {
                return $this->birthday;
        }

        /**
         * Set the value of birthday
         *
         * @return  self
         */ 
        public function setBirthday($birthday)
        {
                $this->birthday = $birthday;

                return $this;
        }

        /**
         * Get the value of deathday
         */ 
        public function getDeathday()
        {
                return $this->deathday;
        }

        /**
         * Set the value of deathday
         *
         * @return  self
         */ 
        public function setDeathday($deathday)
        {
                $this->deathday = $deathday;

                return $this;
        }

        /**
         * Get the value of placeOfBirth
         */ 
        public function getPlaceOfBirth()
        {
                return $this->placeOfBirth;
        }

        /**
         * Set the value of placeOfBirth
         *
         * @return  self
         */ 
        public function setPlaceOfBirth($placeOfBirth)
        {
                $this->placeOfBirth = $placeOfBirth;

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
         * Get the value of profilePath
         */ 
        public function getProfilePath()
        {
                return $this->profilePath;
        }

        /**
         * Set the value of profilePath
         *
         * @return  self
         */ 
        public function setProfilePath($profilePath)
        {
                $this->profilePath = "https://www.themoviedb.org/t/p/w600_and_h900_bestv2".$profilePath;

                return $this;
        }

        /**
         * Get the value of knownForDepartment
         */ 
        public function getKnownForDepartment()
        {
                return $this->knownForDepartment;
        }

        /**
         * Set the value of knownForDepartment
         *
         * @return  self
         */ 
        public function setKnownForDepartment($knownForDepartment)
        {
                $this->knownForDepartment = $knownForDepartment;

                return $this;
        }

        /**
         * Get the value of biography
         */ 
        public function getBiography()
        {
                return $this->biography;
        }

        /**
         * Set the value of biography
         *
         * @return  self
         */ 
        public function setBiography($biography)
        {
                $this->biography = $biography;

                return $this;
        }

        /**
         * Get the value of tabMovie
         */ 
        public function getTabMovie()
        {
                return $this->tabMovie;
        }

        /**
         * Set the value of tabMovie
         *
         * @return  self
         */ 
        public function setTabMovie($tab)
        {
                $this->tabMovie = $tab;

                return $this;
        }
    }

?>