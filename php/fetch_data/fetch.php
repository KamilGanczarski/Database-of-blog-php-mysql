<?php

class Fetch {
  private $query;
  private $query_type;
  private $conn;
  // All keys of object
  private $table_keys = [];
  // Content
  private $table_data = [];
  private $result = [];

  public function __construct() {
    global $conn;
    $this->conn = $conn;
  }

  private function create_connection($query) {
    $this->query = $query;
    mysqli_connect_errno()==0 or die('Błąd połączenia z MySQL: "'. mysqli_connect_error(). '".');
    mysqli_query($this->conn, 'SET NAMES utf8');
    if(!($this->result = mysqli_query($this->conn, $this->query))) {
      $this->table_keys = array('Typ błędu', 'Opis błędu');
      $this->table_data = array(array(
        'Problem z zapytaniem mysql',
        'BŁĄD: problem z zapytaniem "'. $this->query. '".'
      ));
    } else {
      $this->query_type = explode(' ', trim($this->query));
      $this->query_type = $this->query_type[0];
      if($this->query_type === 'SELECT') $this->fetchData();
    }
    // mysqli_close($this->conn);
  }

  /*
   * Create an array of objects
   */
  private function fetchData() {
    if($record = mysqli_fetch_object($this->result)) {
      $this->table_keys = (array) $record;
      $this->table_keys = array_keys($this->table_keys);
      $this->table_data = array(array_values((array) $record));
    }

    if($record = mysqli_fetch_all($this->result)) {
      $this->table_data = array_merge($this->table_data, $record);
    }

    if($this->result->num_rows > 1) {
      $this->result = [];
      foreach($this->table_data as $object) {
        array_push($this->result, array_combine($this->table_keys, $object));
      }
    } else if($this->result->num_rows == 1) {
      $this->result = [];
      array_push(
        $this->result,
        array_combine($this->table_keys, 
        $this->table_data[0])
      );
    } else {
      $this->result = 0;
    }
  }

  public function fetch($query) {
    $this->create_connection($query);
    return $this->result;
  }
}
