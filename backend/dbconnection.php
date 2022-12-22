<?php
require_once 'dbcredentials.php';

// $connection = new mysqli(host_name, user_name, password, db_name);
// if($connection->connect_error) die("Could not establish connection with database: " . $connection->connect_error);


class Database {
    private $connection;

    function __construct() {
        $this->connection = new mysqli(host_name, user_name, password, db_name);
        if($this->connection->connect_error) die("Could not establish connection with database: " . $this->connection->connect_error);
    }

    public function fetchData() {
        $sql = "SELECT * FROM clients_data" ;
        $result = $this->connection->query($sql);
        if(!$result) die("could not extract data from database: " . $this->connection->connect_error);
        
        while($row = $result->fetch_array()) {
            echo "
            <tr>
            <td scope='row'>$row[id]</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[address]</td>
            <td>$row[created_at]</td>
            <td>
            
              <a class='btn btn-md btn-sm btn-primary mb-1' href='edit.php?id=$row[id]'>Edit</a>
        
              <a class='btn btn-md btn-sm btn-danger mb-1' href='delete.php?id=$row[id]'>Delete</a>
            </td>
        
          </tr>
          ";
        }
    }

    public function deleteData() {
        if (isset($_GET["id"])) {
            $id = htmlspecialchars($_GET["id"]);
        
            $sql = "DELETE FROM clients_data WHERE id = $id ";
            $result = $this->connection->query($sql);
        
            if(!$result) {
                echo "Unable to delete client: " .$this->connection->connect_error;
            }
        
            header("location: index.php");
            exit;
        }
        }

    public function getConnection() {
        return $this->connection;
    }
};

$connect = new Database();
$connection = $connect->getConnection();
// $fetchData = $connect->fetchData();
