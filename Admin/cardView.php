<?php
include("Header.php");
include_once("../dboperation.php");
$obj = new dboperation();
?>

<script src="../jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#category_id").change(function() {
        var categoryid = $(this).val();
        if(categoryid != "") {
            
            $("#card").html('<tr><td colspan="8" class="text-center"><div class="spinner-border spinner-border-sm" role="status"></div> Loading cards...</td></tr>');
            
            $.ajax({
                url: "getcard.php",
                method: "POST",
                data: { category_id: categoryid },
                success: function(response) {
                    if(response.trim() === '') {
                        $("#card").html('<tr><td colspan="8" class="text-center text-muted">No cards found in this category</td></tr>');
                    } else {
                        $("#card").html(response);
                    }
                },
                error: function() {
                    $("#card").html('<tr><td colspan="8" class="text-center text-danger"><i class="fas fa-exclamation-triangle"></i> Error loading cards</td></tr>');
                }
            });
        } else {
            $("#card").html('<tr><td colspan="8" class="text-center text-muted">Please select a category to view cards</td></tr>');
        }
    });
    

    $("#card").html('<tr><td colspan="8" class="text-center text-muted">Please select a category to view cards</td></tr>');
});
</script>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12"> <!-- Full width -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0"><i class="fas fa-images me-2"></i>Card Management</h4>
                        </div>
                        <div class="col-auto">
                            <a href="card.php" class="btn btn-light btn-sm">
                                <i class="fas fa-plus me-1"></i> Add New Card
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Filter by Category</label>
                            <select class="form-select form-select-lg" name="category_id" id="category_id">
                                <option value="">-- Select Category --</option>
                                <?php
                                $sql = "SELECT * FROM tbl_category ORDER BY Categoryname ASC";
                                $result = $obj->executequery($sql);
                                while ($r = mysqli_fetch_array($result)) { 
                                    $categoryName = htmlspecialchars($r["Categoryname"] ?? '');
                                ?>
                                    <option value="<?php echo $r["category_id"]; ?>">
                                        <?php echo $categoryName; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div class="text-muted">
                                <small><i class="fas fa-info-circle me-1"></i> Select a category to view associated cards</small>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive rounded">
                        <table class="table table-hover table-bordered mb-0 w-100"> <!-- Added w-100 for full width -->
                            <thead class="table-dark">
                                <tr>
                                    <th width="5%" class="text-center">#</th>
                                    <th width="15%">Card Name</th>
                                    <th width="8%" class="text-center">Copies</th>
                                    <th width="12%" class="text-center">Image 1</th>
                                    <th width="12%" class="text-center">Image 2</th>
                                    <th width="10%" class="text-center">Price</th>
                                    <th width="13%" class="text-center">Video</th>
                                    <th width="15%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="card" class="bg-white">
                                <!-- Content loaded via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer bg-light py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <small class="text-muted"><i class="fas fa-database me-1"></i> Cards will appear here after category selection</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>