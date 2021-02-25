<?php
	class Album {

		private $con;
		private $id;
		private $title;
		private $artistId;
		private $genre;
		private $artworkPath;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = pg_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
			$album = pg_fetch_array($query);

			$this->title = $album['title'];
			$this->artistId = $album['artist'];
			$this->genre = $album['genre'];
			$this->artworkPath = $album['artworkpath'];


		}

		public function getTitle() {
			return $this->title;
		}

		public function getArtist() {
			return new Artist($this->con, $this->artistId);
		}

		public function getGenre() {
			return $this->genre;
		}

		public function getArtworkPath() {
			return $this->artworkPath;
		}

		public function getNumberOfSongs() {
			$query = pg_query($this->con, "SELECT id FROM songs WHERE album='$this->id'");
			return pg_num_rows($query);
		}

		public function getSongIds() {

			$query = pg_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");

			$array = array();

			while($row = pg_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}






	}
?>