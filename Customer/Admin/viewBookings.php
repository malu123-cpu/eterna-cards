<?php
include 'Header.php';
include_once("../dboperation.php");
$obj = new dboperation();
$i=1;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - View Bookings</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }
    .btn-confirm {
      background-color: #88c999;
      color: white;
      border: none;
      padding: 6px 12px;
      cursor: pointer;
      border-radius: 4px;
    }
    .btn-confirm:hover {
      background-color: #6fb382;
    }
    .btn-reject {
      background-color: #e57373;
      color: white;
      border: none;
      padding: 6px 12px;
      cursor: pointer;
      border-radius: 4px;
    }
    .btn-reject:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>
  <h2>Customer Bookings</h2>

  <table>
    <tr>
      <th>#</th>
      <th>Card Name</th>
      <th>Booking Date</th>
      <th>Required Date</th>
      <th>No. of Copies</th>
      <th>Amount</th>
      <th>Content</th>
      <th>Status</th>
      <th>Action</th>
    </tr>

    <?php
    $query = "SELECT * FROM tbl_booking ORDER BY bookingdate DESC";
    $result = $obj->select($query);

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$i}</td>";
      echo "<td>{$row['cardid']}</td>";
      echo "<td>{$row['bookingdate']}</td>";
      echo "<td>{$row['requireddate']}</td>";
      echo "<td>{$row['no_copies']}</td>";
      echo "<td>₹{$row['amount']}</td>";
      echo "<td>{$row['content']}</td>";
      echo "<td>{$row['status']}</td>";
      echo "<td>";
     if ($row['status'] == 'Pending') {
  echo "<form method='POST' action='update_status.php' style='display:inline-block; margin-right:5px;'>
          <input type='hidden' name='booking_id' value='{$row['booking_id']}'>
          <input type='hidden' name='new_status' value='Confirmed'>
          <button type='submit' class='btn-confirm'>Confirm</button>
        </form>";

  echo "<form method='POST' action='update_status.php' style='display:inline-block;'>
          <input type='hidden' name='booking_id' value='{$row['booking_id']}'>
          <input type='hidden' name='new_status' value='Rejected'>
          <button type='submit' class='btn-reject'>Reject</button>
        </form>";
} else {
  echo $row['status'];
}



      echo "</td></tr>";
      $i++;
    }
    
    ?>
  </table>
</body>
</html>
<?php include 'Footer.php'; ?>