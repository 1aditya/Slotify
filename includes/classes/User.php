<?php
	class User {

		private $con;
		private $username;

		public function __construct($con, $username) {
			$this->con = $con;
			$this->username = $username;
		}

		public function getUsername() {
			return $this->username;
		}

		public function getEmail() {
			$query = pg_query($this->con, "SELECT email FROM users WHERE username='$this->username'");
			$row = pg_fetch_array($query);
			return $row['email'];
		}

		public function getFirstAndLastName() {
			$query = pg_query($this->con, "SELECT firstname || lastname as name  FROM users WHERE username='$this->username'");
			$row = pg_fetch_array($query);
			return $row['name'];
		}

	}
?>