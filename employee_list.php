<?php
include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

  <?php include("includes/design-top.php"); ?>
  <?php include("includes/navigation.php"); ?>

  <div class="content">
    <?php
    include 'includes/a_connection.php';
    $db = OpenCon();
    $sql =
      "SELECT * FROM `employee` as e LEFT JOIN user as u ON u.UserId = e.UserId;";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
    ?>
    <div class="table-cont">
      <table>
        <th>Employee Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>City</th>
        <th>Email</th>
        <th>JMBG</th>
        <th>User</th>
        <?php
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['EmployeeId'] . "</td>";
          echo "<td>" . $row['FirstName'] . "</td>";
          echo "<td>" . $row['LastName'] . "</td>";
          echo "<td>" . $row['PhoneNumber'] . "</td>";
          echo "<td>" . $row['Address'] . "</td>";
          echo "<td>" . $row['City'] . "</td>";
          echo "<td>" . $row['Email'] . "</td>";
          echo "<td>" . $row['JMBG'] . "</td>";
          echo "<td>" . $row['UserName'] . "</td>";
        ?>
      <?php
          if ($_SESSION['RoleId'] == 1) {
            echo "<td><a href=employee_edit.php?id='" . $row['EmployeeId'] . "'>Edit</a></td>";
            // echo "<td><a href=employee_delete.php?id=" . $row['EmployeeId'] . ">Delete</a></td>";
          }
          echo "</tr>";
        }
      }
      ?>
      <?php

      if ($_SESSION['RoleId'] == 1) {
      ?>
        <a id="add_new" href="employee_add.php">ADD NEW EMPLOYEE</a>
      <?php
      }
      ?>
      </table>
       <div class="logout">
    <a href="logout.php">LOG OUT</a>
  </div>
    </div>
      <?php
      if ($result->num_rows == 0) {
        echo "There are no employee to display!";
      }
      ?>
     
  </div>


</body>

</html>