<?php
include("Header.php");
include_once("../dboperation.php");
$obj = new dboperation();

if (isset($_GET["districtid"])) {
    $did = $_GET["districtid"];

    $sql = "SELECT * FROM tbl_district WHERE districtid = $did";
    $res = $obj->executequery($sql);
    $display = mysqli_fetch_array($res);
} else {
    echo "<script>alert('No district selected'); window.location='districtView.php';</script>";
    exit;
}
?>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">District Update</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="districtEditAction.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Edit District Name</label>
                                <input type="text" name="districtname" class="form-control" value="<?php echo htmlspecialchars($display["districtname"]); ?>" required>
                            </div>

                            <?php
        
                            ?>

                            <input type="hidden" name="districtid" value="<?php echo $display["districtid"]; ?>">
                            <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick="window.location='districtView.php'" class="btn btn-secondary">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("Footer.php"); ?>
