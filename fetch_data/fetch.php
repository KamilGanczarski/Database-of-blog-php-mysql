<?php

require_once 'connection.php';

class Fetch {
  private $result;
  private $error;
  private $query;
  // All keys of table
  private $tableKeys = [];
  // Array
  private $tableData = [];

  public function __construct() {
    global $connection, $databasesTable;
    $this->connection = $connection;
    $this->databasesTable = $databasesTable;
  }

  private function createConnection($query) {
    $this->query = $query;
    mysqli_connect_errno()==0 or die('Błąd połączenia z MySQL: "'. mysqli_connect_error(). '".');
    mysqli_query($this->connection, 'SET NAMES utf8');
    if(!($this->result = mysqli_query($this->connection, $this->query))) {
      $this->tableKeys = array(
        "Typ błędu",
        "Opis błędu"
      );
      $this->tableData = array(array(
        'Problem z zapytaniem mysql',
        'BŁĄD: problem z zapytaniem "'. $this->query. '".'
      ));
    }
    else {
      if($record = mysqli_fetch_object($this->result)) {
        $this->tableKeys = (array) $record;
        $this->tableKeys = array_keys($this->tableKeys);
        $this->tableData = array(array_values((array) $record));
      }

      if ($record = mysqli_fetch_all($this->result)) {
        $this->tableData = array_merge($this->tableData, $record);
      }

      mysqli_free_result($this->result);
    }
    mysqli_close($this->connection);
  }


  public function fetchData($query) {
    $this->createConnection($query);
    $this->result = [];
    for($i=0; $i<count($this->tableData); $i++) {
      array_push($this->result, array_combine($this->tableKeys, $this->tableData[$i]));
    }
    return $this->result;
  }
}

$Fetch = new Fetch;
$users = $Fetch->fetchData('SELECT * FROM users');
