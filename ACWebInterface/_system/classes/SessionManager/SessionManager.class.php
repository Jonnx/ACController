<?php

	abstract class SessionManager {

		public static function check() {
			$check = false;
			if($_SESSION["INIT"]=="AC" && $_SESSION["user"] != null) {
				$check = true;
			}
			if(!$check) {
				SessionManager::init();
				echo '<meta http-equiv="refresh" content="0; URL=../">';
				exit;
			}
		}

		public static function init() {
			$_SESSION["INIT"] = "AC";
			$_SESSION["user"] = null;
		}

		public static function authorize($email, $password) {
			$db = DB::open();

			// SELECT USER FROM DB
			$escaped_email = $db->real_escape_string($email);
			$escaped_password = $db->real_escape_string($password);
			$select_sql = "SELECT * FROM user WHERE email='$escaped_email' AND password='$escaped_password'";
			$select = $db->query($select_sql);

			$success = false;
			if ($select->num_rows == 1) {
				$_SESSION["user"] = $email;
				$success = true;
			}
			$db->close();
			return $success;
		}

	}


?>