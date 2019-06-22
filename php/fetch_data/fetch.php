<?php

require 'connection.php';

class Fetch {
  private $query;
  private $error;
  private $queryType;
  // All keys of table
  private $tableKeys = [];
  // Content
  private $tableData = [];
  private $result = [];

  public function __construct() {
    global $connection;
    $this->connection = $connection;
  }

  private function createConnection($query) {
    $this->query = $query;
    mysqli_connect_errno()==0 or die('Błąd połączenia z MySQL: "'. mysqli_connect_error(). '".');
    mysqli_query($this->connection, 'SET NAMES utf8');
    if(!($this->result = mysqli_query($this->connection, $this->query))) {
      $this->tableKeys = array(
        'Typ błędu',
        'Opis błędu'
      );
      $this->tableData = array(array(
        'Problem z zapytaniem mysql',
        'BŁĄD: problem z zapytaniem "'. $this->query. '".'
      ));
    }
    else {
      $this->queryType = explode(' ', trim($this->query));
      $this->queryType = $this->queryType[0];

      if($this->queryType === 'SELECT') {
        $this->fetchData();
      }
    }
    // mysqli_close($this->connection);
  }

  private function fetchData() {
    if($record = mysqli_fetch_object($this->result)) {
      $this->tableKeys = (array) $record;
      $this->tableKeys = array_keys($this->tableKeys);
      $this->tableData = array(array_values((array) $record));
    }
    if($record = mysqli_fetch_all($this->result)) {
      $this->result = [];
      $this->tableData = array_merge($this->tableData, $record);
      for($i=0; $i<count($this->tableData); $i++) {
        array_push($this->result, array_combine($this->tableKeys, $this->tableData[$i]));
      }
    }
  }

  public function fetch($query) {
    $this->createConnection($query);
    return $this->result;
  }
}
