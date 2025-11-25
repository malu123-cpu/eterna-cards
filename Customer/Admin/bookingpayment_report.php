<?php
session_start();
include('../dboperation.php');
$obj = new dboperation();

// Excel download - must come before any output
if (isset($_POST['download'])) {
    $fromDate = $_POST['fromdate'];
    $toDate = $_POST['todate'];

    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=BookingPayments_{$fromDate}_to_{$toDate}.xls");
    echo "Sl.No\tBooking ID\tCard Name\tCategory\tCustomer Name\tEmail\tContact No\tAmount\tDate\tStatus\n";

    $sql = "SELECT p.payment_id, b.booking_id, c.cardname, cat.categoryname, cu.customername, cu.email, cu.contactno, p.total_amount, p.date, p.status 
            FROM tbl_payment p
            INNER JOIN tbl_booking b ON p.booking_id = b.booking_id
            INNER JOIN tbl_card c ON b.cardid = c.cardid
            INNER JOIN tbl_category cat ON c.category_id = cat.category_id
            INNER JOIN tbl_custreg cu ON b.customerid = cu.customerid
            WHERE p.date BETWEEN '$fromDate' AND '$toDate'
            ORDER BY p.date ASC";

    $res = $obj->executequery($sql);

    if (!$res) {
        die("SQL Error: " . $obj->con->error);
    }

    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        echo "{$i}\t{$row['booking_id']}\t{$row['cardname']}\t{$row['categoryname']}\t{$row['customername']}\t{$row['email']}\t{$row['contactno']}\t{$row['total_amount']}\t{$row['date']}\t{$row['status']}\n";
        $i++;
    }
    exit;
}

// Normal HTML display
include('Header.php');

// Retain date selections
$fromDate = isset($_POST['fromdate']) ? $_POST['fromdate'] : '';
$toDate = isset($_POST['todate']) ? $_POST['todate'] : '';
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Booking Payment Report</h2>

    <form method="post" class="text-center mb-4">
        <label>From: </label>
        <input type="date" name="fromdate" required value="<?php echo $fromDate; ?>">
        <label>To: </label>
        <input type="date" name="todate" required value="<?php echo $toDate; ?>">
        <button type="submit" name="filter" class="btn btn-primary btn-sm">Filter</button>
        <button type="submit" name="download" class="btn btn-success btn-sm">Download Excel</button>
    </form>

    <?php
    if (isset($_POST['filter'])) {
        $sql = "SELECT p.payment_id, b.booking_id, c.cardname, cat.categoryname, cu.customername, cu.email, cu.contactno, p.total_amount, p.date, p.status 
                FROM tbl_payment p
                INNER JOIN tbl_booking b ON p.booking_id = b.booking_id
                INNER JOIN tbl_card c ON b.cardid = c.cardid
                INNER JOIN tbl_category cat ON c.category_id = cat.category_id
                INNER JOIN tbl_custreg cu ON b.customerid = cu.customerid
                WHERE p.date BETWEEN '$fromDate' AND '$toDate'
                ORDER BY p.date ASC";

        $res = $obj->executequery($sql);

        if (!$res) {
            echo "<p class='text-danger text-center'>SQL Error: " . $obj->con->error . "</p>";
        } elseif (mysqli_num_rows($res) > 0) {
            echo "<table class='table table-bordered text-center'>
                    <thead class='table-dark'>
                        <tr>
                            <th>Sl.No</th>
                            <th>Booking ID</th>
                            <th>Card Name</th>
                            <th>Category</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead><tbody>";

            $i = 1;
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['booking_id']}</td>
                        <td>{$row['cardname']}</td>
                        <td>{$row['categoryname']}</td>
                        <td>{$row['customername']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['contactno']}</td>
                        <td>{$row['total_amount']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['status']}</td>
                      </tr>";
                $i++;
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='text-center text-warning'>No records found for selected dates.</p>";
        }
    }
    ?>
</div>
