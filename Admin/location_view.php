<?php
include("Header.php");
include_once("../dboperation.php");
$obj = new dboperation();
?>

<script src="../jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#districtid").change(function() {
        var district_id = $(this).val();
        if(district_id != "") {
            $("#location").html('<tr><td colspan="3" class="text-center"><div class="spinner-border spinner-border-sm" role="status"></div> Loading locations...</td></tr>');
            
            $.ajax({
                url: "getlocation.php",
                method: "POST",
                data: { districtid: district_id },
                success: function(response) {
                    if(response.trim() === '') {
                        $("#location").html('<tr><td colspan="3" class="text-center text-muted">No locations found for this district</td></tr>');
                    } else {
                        $("#location").html(response);
                    }
                },
                error: function() {
                    $("#location").html('<tr><td colspan="3" class="text-center text-danger"><i class="fas fa-exclamation-triangle"></i> Error loading locations</td></tr>');
                }
            });
        } else {
            $("#location").html('<tr><td colspan="3" class="text-center text-muted">Please select a district to view locations</td></tr>');
        }
    });
    
    $("#location").html('<tr><td colspan="3" class="text-center text-muted">Please select a district to view locations</td></tr>');
});
</script>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0"><i class="fas fa-map-marker-alt me-2"></i>Location Management</h4>
                        </div>
                        <div class="col-auto">
                            <a href="locationAdd.php" class="btn btn-light btn-sm">
                                <i class="fas fa-plus me-1"></i> Add New
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Filter by District</label>
                            <select class="form-select form-select-lg" name="districtid" id="districtid">
                                <option value="">-- Select District --</option>
                                <?php
                                $sql = "SELECT * FROM tbl_district ORDER BY districtname ASC";
                                $result = $obj->executequery($sql);
                                while ($r = mysqli_fetch_array($result)) { 
                                    $districtName = htmlspecialchars($r["districtname"] ?? '');
                                ?>
                                    <option value="<?php echo $r["districtid"]; ?>">
                                        <?php echo $districtName; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div class="text-muted">
                                <small><i class="fas fa-info-circle me-1"></i> Select a district to view associated locations</small>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive rounded">
                        <table class="table table-hover table-bordered mb-0" style="width: 100%">
                            <thead class="table-dark">
                                <tr>
                                    <th width="10%" class="text-center">#</th>
                                    <th width="60%">Location Name</th>
                                    <th width="30%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="location" class="bg-white">
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer bg-light py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <small class="text-muted"><i class="fas fa-database me-1"></i> Locations will appear here after district selection</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>
