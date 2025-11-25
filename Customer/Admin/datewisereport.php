<?php
include("../dboperation.php");
$obj = new dboperation();
$customers = [];
$from = $to = '';
$grandTotal = 0;

if (isset($_POST['filter'])) {
    $from = $_POST['fromdate'] ?? '';
    $to = $_POST['todate'] ?? '';

    if (!empty($from) && !empty($to)) {
        // Basic sanitization
        $from = mysqli_real_escape_string($obj->con, $from);
        $to = mysqli_real_escape_string($obj->con, $to);

        // Query without location join
        $sql = "SELECT r.*, u.customername, u.email
                FROM tbl_booking r
                INNER JOIN tbl_custreg u ON u.customerid = r.customerid
                WHERE r.bookingdate >= '$from 00:00:00' AND r.bookingdate <= '$to 23:59:59'
                ORDER BY r.bookingdate ASC";
        $res = $obj->executequery($sql);

        while ($row = mysqli_fetch_array($res)) {
            $customers[] = $row;
            $grandTotal += $row['amount'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Customer Booking Report</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
<h2 class="mb-4 text-center">Booking Report</h2>
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label class="form-label">From Date</label>
        <input type="date" name="fromdate" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">To Date</label>
        <input type="date" name="todate" class="form-control" required>
    </div>
    <div class="col-md-4 d-flex align-items-end">
        <button type="submit" name="filter" class="btn btn-primary w-100">Filter</button>
    </div>
</form>

<?php if (!empty($customers)) { ?>
<!-- Export to Excel button -->
<form method="post" action="export_excel.php">
    <input type="hidden" name="bookingdate" value="<?php echo htmlspecialchars($from); ?>">
    <input type="hidden" name="requireddate" value="<?php echo htmlspecialchars($to); ?>">
    <button type="submit" class="btn btn-success mb-4">Export to Excel</button>
</form>
<?php } ?>

<?php if (!empty($customers)) { ?>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
<th>Booking ID</th>
<th>Customer Name</th>
<th>Email</th>
<th>Type</th>
<th>Amount</th>
<th>Booking Date</th>
<th>Required Date</th>
</tr>
</thead>
<tbody>
<?php foreach ($customers as $cust) { ?>
<tr>
    <td><?php echo htmlspecialchars($cust['booking_id']); ?></td>
    <td><?php echo htmlspecialchars($cust['customername']); ?></td>
    <td><?php echo htmlspecialchars($cust['email']); ?></td>
    <td><?php echo htmlspecialchars($cust['type']); ?></td>
    <td><?php echo htmlspecialchars($cust['amount']); ?></td>
    <td><?php echo htmlspecialchars($cust['bookingdate']); ?></td>
    <td><?php echo htmlspecialchars($cust['requireddate']); ?></td>
</tr>
<?php } ?>
</tbody>
<tfoot>
<tr>
<th colspan="4" class="text-end">Grand Total:</th>
<th colspan="3"><?php echo htmlspecialchars($grandTotal); ?></th>
</tr>
</tfoot>
</table>
</div>
<?php } elseif (isset($_POST['filter'])) { ?>
<p class="text-center text-danger">No customers found in this date range.</p>
<?php } ?>
</div>
</body>
</html>
