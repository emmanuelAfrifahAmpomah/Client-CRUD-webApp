<?php
require_once 'dbconnection.php';

// we fetch output from dbconnection file into this file and display in the index.php file
$fetchData = $connect->fetchData();

// $sql = "SELECT * FROM clients_data";

// $result = $connection->query($sql);
// if(!$result) die("could not extract data from database: " . $connection->connect_error);


// fetching row data from database
// while($row = $result->fetch_array()) {
//     echo "
//     <tr>
//     <td scope='row'>$row[id]</td>
//     <td>$row[name]</td>
//     <td>$row[email]</td>
//     <td>$row[phone]</td>
//     <td>$row[address]</td>
//     <td>$row[created_at]</td>
//     <td>
    
//       <a class='btn btn-md btn-sm btn-primary mb-1' href='edit.php?id=$row[id]'>Edit</a>

//       <a class='btn btn-md btn-sm btn-danger mb-1' href='delete.php?id=$row[id]'>Delete</a>
//     </td>

//   </tr>
//   ";
// }



// $rows = $result->num_rows; data-bs-toggle='modal' data-bs-target='#exampleModal' href='delete.php?id=$row[id]'  <div class=' d-grid mb-2'>
// echo "<table><tr><th>id</th><th>name</th><th>email</th><th>phone</th><th>address</th><th>created_at</th></tr>";
// for($i=0; $i<$rows; ++$i) {
//     $row = $result->fetch_array(MYSQLI_BOTH);

//     echo "<tr>";
//     for($j=0; $j<=5; ++$j) {
//         echo "<td>" . htmlspecialchars($row[$j]) . "</td>";
//     }
//     echo "</tr>";
// }

// echo "</table>";