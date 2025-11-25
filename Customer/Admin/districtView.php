<?php
include 'Header.php';
include_once '../dboperation.php';
$obj = new dboperation();
?>

<div class="col-12">
    <div class="body-wrapper-inner">
        <div class="container-fluid pt-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="card-title"><b>DISTRICT TABLE</b></h4>
                    </div>
                    <table class="table table-striped table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>District Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $s = 1;
                            $districts = $obj->executequery("SELECT * FROM tbl_district ORDER BY districtid ASC");
                            while ($d = mysqli_fetch_assoc($districts)) {
                            ?>
                                <tr>
                                    <td><?php echo $s++; ?></td>
                                    <td><?php echo $d['districtname']; ?></td>
                                    <td>
                                        <a href="districtEdit.php?districtid=<?php echo $d['districtid']; ?>" 
                                           class="btn btn-primary btn-sm">Edit</a>
                                        <a href="districtDelete.php?districtid=<?php echo $d['districtid']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            if ($s == 1) {
                                echo '<tr><td colspan="3" class="text-center">No districts found.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>