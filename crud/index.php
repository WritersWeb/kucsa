<?php
//  including the DB connection

require_once 'db.php'; 

//  sql command to  to fetch all memberrecords
$sql = "SELECT id, first_name, last_name, email FROM members ORDER BY id DESC";
// Execute query
$result = $conn-> query($sql); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Example - Read </title>
   
</head>
<body>
    <h2>Members List (READ)</h2>
    <!-- Link to the Create page -->
    <a href="create.php" class="btn btn-add">Add New Member</a>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php

        //  Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row using a loop
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                // htmlspecialchars() prevents Cross-Site Scripting (XSS)
                echo "<td>" ($row["first_name"]) . "</td>";
                echo "<td>" ($row["last_name"]) . "</td>";
                echo "<td>"($row["email"]) . "</td>";
                // Actions include Update and Delete logic
                echo "<td>b
                        <a href='update.php?id=" . $row["id"] . "' class='btn btn-edit'>Edit</a> 
                        <a href='delete.php?id=" . $row["id"] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this member?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            // If no data is available
            echo "<tr><td colspan='5' style='text-align: center;'>No memberss found in the database. Add one</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php 

$conn->close(); 
?>
