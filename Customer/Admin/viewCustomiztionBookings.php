<?php
include 'Header.php';
include_once("../dboperation.php");
$obj = new dboperation();
$i=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - View Customization Bookings</title>
  <style>
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
    .btn-confirm { background-color: #88c999; color: white; border: none; padding: 6px 12px; cursor: pointer; border-radius: 4px; }
    .btn-confirm:hover { background-color: #6fb382; }
    .btn-reject { background-color: #e57373; color: white; border: none; padding: 6px 12px; cursor: pointer; border-radius: 4px; }
    .btn-reject:hover { background-color: #d32f2f; }
    .hidden-form { display:none; margin-top:10px; }
  </style>
  <script>
    function showAcceptForm(id) {
      document.getElementById("acceptForm_"+id).style.display = "block";
      document.getElementById("rejectForm_"+id).style.display = "none";
    }
    function showRejectForm(id) {
      document.getElementById("rejectForm_"+id).style.display = "block";
      document.getElementById("acceptForm_"+id).style.display = "none";
    }
  </script>
</head>
<body>
  <h2>Customization Bookings</h2>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Content</th>
        <th>Sample Design</th>
        <th>Booking Date</th>
        <th>Required Date</th>
        <th>Remark</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM tblcustomization
      inner join tbl_category on tblcustomization.category_id=tbl_category.category_id
       ORDER BY booking_date DESC";
      $result = $obj->select($query);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$row['Categoryname']}</td>";
        echo "<td>{$row['quantity']}</td>";
        echo "<td>{$row['content']}</td>";
        echo "<td><img src='../Uploads/{$row['sample_design']}' alt='image' width='100' height='100'></td>";
        echo "<td>{$row['booking_date']}</td>";
        echo "<td>{$row['required_date']}</td>";
        echo "<td>{$row['remark']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td>";

        if ($row['status'] == 'Pending') {
          // Accept & Reject buttons
          echo "<button onclick=\"showAcceptForm({$row['customization_id']})\" class='btn-confirm'>Accept</button>";
          echo "<button onclick=\"showRejectForm({$row['customization_id']})\" class='btn-reject'>Reject</button>";

          // Accept Form
          echo "<form method='POST' action='update_customize.php' enctype='multipart/form-data' 
                    id='acceptForm_{$row['customization_id']}' class='hidden-form'>
                  <input type='hidden' name='customization_id' value='{$row['customization_id']}'>
                  <input type='hidden' name='new_status' value='Accepted'>
                  Rate: <input type='number' name='rate' required><br><br>
                  Final Card: <input type='file' name='final_card' accept='image/*' required><br><br>
                  <button type='submit' class='btn-confirm'>Accept Now</button>
                </form>";

          // Reject Form
          echo "<form method='POST' action='update_customize.php' 
                    id='rejectForm_{$row['customization_id']}' class='hidden-form'>
                  <input type='hidden' name='customization_id' value='{$row['customization_id']}'>
                  <input type='hidden' name='new_status' value='Rejected'>
                  Preview Remark: <input type='text' name='preview' required><br><br>
                  <button type='submit' class='btn-reject'>Reject Now</button>
                </form>";
        } else {
          echo $row['status'];
        }

        echo "</td></tr>";
        $i++;
      }
      ?>
    </tbody>
  </table>
</body>
</html>
<?php include 'Footer.php';
?>
