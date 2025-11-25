<?php
session_start();
include 'Header.php';
include_once("../dboperation.php");

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$obj = new dboperation();

$sql = "SELECT p.*, c.customization_id, c.quantity, c.content, c.required_date,
        cat.Categoryname, cr.customername, cr.contactno
        FROM tbl_payment p
        INNER JOIN tblcustomization c ON p.customization_id = c.customization_id
        INNER JOIN tbl_category cat ON c.category_id = cat.category_id
        INNER JOIN tbl_custreg cr ON c.customerid = cr.customerid
        WHERE p.type = 'customization'
        ORDER BY p.date DESC";

$res = $obj->executequery($sql);
?>

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="card-title mb-0 text-center">Customization Payments Management</h4>
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
                                        <th width="15%">Category</th>
                                        <th width="8%">Quantity</th>
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
                                                <td><?php echo htmlspecialchars($row['Categoryname']); ?></td>
                                                <td class="text-center"><?php echo $row['quantity']; ?></td>
                                                <td class="fw-bold text-success">₹<?php echo number_format($row['total_amount'], 2); ?></td>
                                                <td>
                                                    <span class="badge bg-success"><?php echo ucfirst($row['status']); ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="viewpaymentdetails.php?payment_id=<?php echo $row['payment_id']; ?>&type=customization" 
                                                       class="btn btn-outline-primary btn-sm"
                                                       title="View Customization Details">
                                                        <i class="ti ti-eye"></i> View
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php } } else { ?>
                                        <tr>
                                            <td colspan="9" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="ti ti-settings fs-1"></i>
                                                    <p class="mt-2 mb-0">No customization payments found</p>
                                                    <small>All customization payments will appear here</small>
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