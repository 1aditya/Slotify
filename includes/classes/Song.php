<?php

    class Song{
        private $id;
        private $con;
        private $mysqliData;
        private $title;
        private $artistId;
        private $albumId;
        private $genre;
        private $duration;
        private $path;

        public function __construct($con,$id){
            $this->con = $con;
            $this->id = $id;
            $query = pg_query($this->con,"SELECT * FROM songs WHERE id='$this->id'");
            $this->mysqiData = pg_fetch_array($query);
            $this->title =  $this->mysqiData['title'];
            $this->artistId =  $this->mysqiData['artist'];
            $this->albumId =  $this->mysqiData['album'];
            $this->genre =  $this->mysqiData['genre'];
            $this->duration =  $this->mysqiData['duration'];
            $this->path =  $this->mysqiData['path'];
        }
        public function getTitle(){
            return $this->title;
        }

        public function getId(){
            return $this->id;
        }

        public function getArtist(){
            return new Artist($this->con,$this->artistId);
        }
        public function getAlbum(){
            return new Album($this->con,$this->albumId);
        }
        public function getPath(){
            return $this->Path;
        }
        public function getDuration(){
            return $this->duration;
        }
        public function getMysqliData(){
            return $this->mysqliData;
        }
        public function getGenre(){
            return $this->genre;
        }
        

    }

?>