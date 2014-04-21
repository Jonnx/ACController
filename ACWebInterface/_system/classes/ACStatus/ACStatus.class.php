<?php

	abstract class ACStatus {


		public static function getStatus() {
			$db = DB::open();

			$select_sql = "SELECT * FROM status ORDER BY `timestamp` DESC LIMIT 1";
			$status_raw = $db->query($select_sql);
			$status = $status_raw->fetch_assoc();

			$db->close();
			return $status["status"];
		}

		public static function setStatus($newStatus) {
			$db = DB::open();
			$escaped_status = $db->real_escape_string($newStatus);
			$insert_sql = "INSERT INTO status VALUES(".time().", '".$_SESSION["user"]."', $escaped_status);";
			$db->query($insert_sql);
			$db->close();
		}

	}

?>