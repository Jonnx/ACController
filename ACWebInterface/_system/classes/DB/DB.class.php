<?php

   abstract class DB {

    /**
     * open a mysqli database connection to the server
     * @return mysqli an instance of a mysqli connection object 
     */
    public static function open() {
      return new mysqli("host", "user", "password", "database");
    }

  }

?>