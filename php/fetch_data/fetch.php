<?php

require_once 'connection.php';

class Fetch {
   private $query;
   private $query_type;
   private $Conn;
   private $statement;
   // Content
   private $table_data = [];

   public function __construct() {
      $this->Conn; // Connection to mysql
   }

   private function query_to_table() {
      foreach($this->Conn->query($this->query) as $row) {
         array_push($this->table_data, $row);
      }
   }

   private function modify_table() {
      // $this->query
      $this->statement = $this->Conn->prepare($this->query);
      $this->statement->execute();
      $this->table_data = [[
         'Type of error' => 'Problem with mysql query',
         'Error description' => "Error: problem with query $this->query"
       ]];
   }

   public function fetch($query) {
      global $conn_info;
      $this->query = $query;
      try {
         $this->Conn = new PDO(
            $conn_info['host_database'],
            $conn_info['username'],
            $conn_info['password']);
         $this->Conn->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         $this->Conn->exec('SET CHARSET SET utf8');

         $this->query_type = explode(' ', trim($this->query));
         $this->query_type = $this->query_type[0];
         if($this->query_type === 'SELECT') {
            $this->query_to_table();
         } else {
            $this->modify_table();
         }
         return $this->table_data;
         $Conn = null;
      }
      catch(PDOException $e) {
         $this->table_data = ['Error: ' => $e->getMessage()];
      }
   }
}