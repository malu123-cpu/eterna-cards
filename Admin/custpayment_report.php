<?php
session_start();
include('../dboperation.php');
$obj = new dboperation();

$fromDate = isset($_POST['fromdate']) ? $_POST['fromdate'] : '';
$toDate   = isset($_POST['todate'])   ? $_POST['todate']   : '';
$results  = [];

if (isset($_POST['download'])) {
    if (empty($fromDate) || empty($toDate)) {
        header('Content-Type: text/plain; charset=utf-8');
        echo "Please select From and To dates before downloading.";
        exit;
    }

    $from = mysqli_real_escape_string($obj->con, $fromDate);
    $to   = mysqli_real_escape_string($obj->con, $toDate);

    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=CustomizationPayments_{$from}_to_{$to}.xls");

    echo "Sl.No\tCustomization ID\tCategory\tContent\tCustomer Name\tEmail\tContact No\tAmount\tDate\tStatus\n";

    $sql = "SELECT
                p.payment_id,
                cu.customization_id,
                COALESCE(cat.Categoryname, '') AS categoryname,
                COALESCE(cu.content, '') AS content,
                COALESCE(cust.customername, '') AS customername,
                COALESCE(cust.email, '') AS email,
                COALESCE(cust.contactno, '') AS contactno,
                p.total_amount,
                p.date,
                COALESCE(p.status, '') AS status
            FROM tbl_payment p
            INNER JOIN tblcustomization cu ON p.customization_id = cu.customization_id
            LEFT JOIN tbl_category cat ON cu.category_id = cat.category_id
            LEFT JOIN tbl_custreg cust ON cu.customerid = cust.customerid
            WHERE p.date BETWEEN '$from' AND '$to'
            ORDER BY p.date ASC";

    $res = $obj->executequery($sql);
    if (!$res) {
        header('Content-Type: text/plain; charset=utf-8');
        echo "SQL Error: " . ($obj->con->error ?? mysqli_error($obj->con));
        exit;
    }

    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $category = str_replace(["\t","\r","\n"], ' ', $row['categoryname']);
        $content  = str_replace(["\t","\r","\n"], ' ', $row['content']);
        $cname    = str_replace(["\t","\r","\n"], ' ', $row['customername']);
        $email    = str_replace(["\t","\r","\n"], ' ', $row['email']);
        $contact  = str_replace(["\t","\r","\n"], ' ', $row['contactno']);
        $status   = str_replace(["\t","\r","\n"], ' ', $row['status']);
        $amount   = $row['total_amount'];
        $date     = $row['date'];

        echo "{$i}\t{$row['customization_id']}\t{$category}\t{$content}\t{$cname}\t{$email}\t{$contact}\t{$amount}\t{$date}\t{$status}\n";
        $i++;
    }
    exit;
}

include('Header.php');
?>

<div class="container mt-5">
    <h4 class="mb-4">Customization Payments Report</h4>

    <form method="POST" class="row g-3 mb-3 align-items-center">
        <div class="col-auto">
            <input type="date" name="fromdate" class="form-control" required value="<?php echo htmlspecialchars($fromDate); ?>">
        </div>
        <div class="col-auto">
            <input type="date" name="todate" class="form-control" required value="<?php echo htmlspecialchars($toDate); ?>">
        </div>
        <div class="col-auto">
            <button type="submit" name="filter" class="btn btn-primary">Filter</button>
        </div>
        <div class="col-auto">
            <button type="submit" name="download" class="btn btn-success">Download Excel</button>
        </div>
    </form>

<?php
if (isset($_POST['filter'])) {
    $from = mysqli_real_escape_string($obj->con, $fromDate);
    $to   = mysqli_real_escape_string($obj->con, $toDate);

    $sql = "SELECT
                p.payment_id,
                cu.customization_id,
                COALESCE(cat.Categoryname, '') AS categoryname,
                COALESCE(cu.content, '') AS content,
                COALESCE(cust.customername, '') AS customername,
                COALESCE(cust.email, '') AS email,
                COALESCE(cust.contactno, '') AS contactno,
                p.total_amount,
                p.date,
                COALESCE(p.status, '') AS status
            FROM tbl_payment p
            INNER JOIN tblcustomization cu ON p.customization_id = cu.customization_id
            LEFT JOIN tbl_category cat ON cu.category_id = cat.category_id
            LEFT JOIN tbl_custreg cust ON cu.customerid = cust.customerid
            WHERE p.date BETWEEN '$from' AND '$to'
            ORDER BY p.date ASC";

    $res = $obj->executequery($sql);

    if (!$res) {
        echo "<p class='text-danger'>SQL Error: " . htmlspecialchars($obj->con->error ?? mysqli_error($obj->con)) . "</p>";
    } else {
        while ($row = mysqli_fetch_assoc($res)) {
            $results[] = $row;
        }
    }

    if (count($results) > 0) {
        echo "<table class='table table-bordered table-striped'>
                <thead>
                 <tr>
                    <th>Sl. No.</th>
                    <th>Customization ID</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                 </tr>
                </thead>
                <tbody>";
        $sl = 1;
        foreach ($results as $row) {
            echo "<tr>
                    <td>{$sl}</td>
                    <td>" . htmlspecialchars($row['customization_id']) . "</td>
                    <td>" . htmlspecialchars($row['categoryname']) . "</td>
                    <td>" . htmlspecialchars($row['content']) . "</td>
                    <td>" . htmlspecialchars($row['customername']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['contactno']) . "</td>
                    <td>" . htmlspecialchars($row['total_amount']) . "</td>
                    <td>" . htmlspecialchars($row['date']) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                  </tr>";
            $sl++;
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='text-warning'>No records found for selected dates.</p>";
    }
}
?>

</div>

<?php include('Footer.php'); ?>
