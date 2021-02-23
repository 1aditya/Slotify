<?php

    class Artist {
        private $id;
        private $con;

        public function __construct($con,$id){
            $this->con = $con;
            $this->id = $id;
        }

        public function getName(){
            $artistQuery = pg_query($this->con,"SELECT name FROM artists WHERE id='$this->id'");
            $artist = pg_fetch_array($artistQuery);
            return $artist['name'];
        }
            
    }

?>