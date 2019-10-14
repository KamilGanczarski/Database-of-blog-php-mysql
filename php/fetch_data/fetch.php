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
    global $Conn;
    $this->Conn = $Conn;
  }

  private function check_connection() {
    if($this->Conn->connect_error) {
      die('Connection failed: ' . $Conn->connection_error);
    }
    $this->result = $this->Conn->query($this->query);
    return ($this->result) ? true : false;
  }

  public function fetch($query) {
    $this->query = $query;

    if($this->check_connection()) {
      $this->query_type = explode(' ', trim($this->query));
      $this->query_type = $this->query_type[0];
      if($this->query_type === 'SELECT') {
        $this->fetch_data();
        return $this->result;
      } else {
        return 'The query has executed';
      }
    } else {
      $this->result = [[
        'Type of error' => 'Problem with mysql query',
        'Error description' => 'Error: problem with query "'. $this->query. '".'
      ]];
      return $this->result;
    }
    $this->Conn->close();
  }

  /*
   * Create an array of objects
   */
  private function fetch_data() {
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
}