<?php
	class Artist {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function getName() {
			$artistQuery = pg_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
			$artist = pg_fetch_array($artistQuery);
			return $artist['name'];
		}
		
		public function getSongIds() {

			$query = pg_query($this->con, "SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays ASC");

			$array = array();

			while($row = pg_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}
	}
?>