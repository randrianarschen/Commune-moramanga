<?php
 class Database{
    private static $instance = null;
  public  static function getPdo(): PDO
  {
    if (self::$instance === null) {
        try{
      self::$instance = new PDO('sqlite:./databaseCommune.db');
    }catch(PDOException $e){
      echo $e->getMessage();
    }
    }
    return self::$instance;
}
  }
?>