<?php
include("../dboperation.php");
$obj = new dboperation();

if (isset($_POST['bookingdate']) && isset($_POST['requireddate'])) {
    $from = $_POST['bookingdate'];
    $to = $_POST['requireddate'];
    $grandTotal = 0;

    // Fixed query without tbl_location join
    $sql = "SELECT r.*, u.customername, u.email
            FROM tbl_booking r
            INNER JOIN tbl_custreg u ON u.customerid = r.customerid
            WHERE r.bookingdate BETWEEN '$from' AND '$to'
            ORDER BY r.bookingdate ASC";
    $res = $obj->executequery($sql);

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Booking_Report_" . date('Y-m-d') . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo "<h2 style='text-align:center;'>Booking Report</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Booking ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Booking Date</th>
            <th>Required Date</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['booking_id']}</td>
                <td>{$row['customername']}</td>
                <td>{$row['email']}</td>
                <td>{$row['type']}</td>
                <td>{$row['amount']}</td>
                <td>{$row['bookingdate']}</td>
                <td>{$row['requireddate']}</td>
              </tr>";
        $grandTotal += $row['amount'];
    }

    echo "<tr>
            <th colspan='4'>Grand Total</th>
            <th colspan='3'>{$grandTotal}</th>
          </tr>";
    echo "</table>";
    exit;
}
?>
