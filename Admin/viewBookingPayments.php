<?php
session_start();
include 'Header.php';
include_once("../dboperation.php");

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$obj = new dboperation();

$sql = "SELECT p.*, b.booking_id, b.bookingdate, b.requireddate, b.no_copies, b.content,
        c.cardname, cr.customername, cr.contactno
        FROM tbl_payment p
        INNER JOIN tbl_booking b ON p.booking_id = b.booking_id
        INNER JOIN tbl_card c ON b.cardid = c.cardid
        INNER JOIN tbl_custreg cr ON b.customerid = cr.customerid
        WHERE p.type = 'booking'
        ORDER BY p.date DESC";
$res = $obj->executequery($sql);
?>

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="card-title mb-0 text-center">Booking Payments Management</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th width="8%">Payment ID</th>
                                        <th width="12%">Date</th>
                                        <th width="15%">Customer Name</th>
                                        <th width="12%">Contact</th>
                                        <th width="15%">Card Name</th>
                                        <th width="8%">Copies</th>
                                        <th width="10%">Amount</th>
                                        <th width="10%">Status</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($res) > 0) { 
                                        while($row = mysqli_fetch_array($res)) { ?>
                                            <tr>
                                                <td class="fw-semibold">#<?php echo $row['payment_id']; ?></td>
                                                <td><?php echo date('d-M-Y', strtotime($row['date'])); ?></td>
                                                <td><?php echo htmlspecialchars($row['customername']); ?></td>
                                                <td><?php echo htmlspecialchars($row['contactno']); ?></td>
                                                <td><?php echo htmlspecialchars($row['cardname']); ?></td>
                                                <td class="text-center"><?php echo $row['no_copies']; ?></td>
                                                <td class="fw-bold text-success">₹<?php echo number_format($row['total_amount'], 2); ?></td>
                                                <td>
                                                    <span class="badge bg-success"><?php echo ucfirst($row['status']); ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="viewpaymentdetails.php?payment_id=<?php echo $row['payment_id']; ?>&type=booking" 
                                                       class="btn btn-outline-primary btn-sm"
                                                       title="View Payment Details">
                                                        <i class="ti ti-eye"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php } } else { ?>
                                        <tr>
                                            <td colspan="9" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="ti ti-credit-card fs-1"></i>
                                                    <p class="mt-2 mb-0">No booking payments found</p>
                                                    <small>All booking payments will appear here</small>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>