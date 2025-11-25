<?php
include("Header.php");
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_GET["locationid"])) 
{
    $id = $_GET["locationid"];
    $sql = "select * from tbl_location where locationid=$id";
    $res = $obj->executequery($sql);
    $display = mysqli_fetch_array($res); 
}
?>
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="card-title mb-0 text-center fs-4">Location Update</h5>
                    </div>
                    <div class="card-body p-5">
                        <form action="locationeditAction.php" method="POST" onsubmit="return validateLocation()">
                            <input type="hidden" name="locationid" class="form-control" value="<?php echo $display["locationid"]; ?>">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Edit Location Name</label>
                                <input type="text" name="locationname" class="form-control form-control-lg" 
                                       id="locationname" value="<?php echo htmlspecialchars($display["locationname"]); ?>"
                                       pattern="[A-Z][a-zA-Z]*" 
                                       title="Must start with capital letter followed by upper or lowercase letters"
                                       required>
                                <div class="form-text">Must start with capital letter followed by upper or lowercase letters</div>
                            </div>
                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg px-5">Update</button>
                                <button type="button" class="btn btn-secondary btn-lg px-5" onclick="history.back()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function validateLocation() {
    const locationName = document.getElementById('locationname').value;
    const pattern = /^[A-Z][a-zA-Z]*$/;
    
    if (!pattern.test(locationName)) {
        alert('Location name must start with capital letter and contain only letters');
        return false;
    }
    return true;
}
</script>

<?php
include("Footer.php");
?>