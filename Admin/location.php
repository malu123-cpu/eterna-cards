<?php include 'Header.php'; 
include_once("../dboperation.php");
$obj = new dboperation();
$sqlquery = "SELECT * FROM tbl_district";
$result = $obj->executequery($sqlquery);
?>

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-xl-10">
        <div class="card shadow-sm mt-4">
          <div class="card-header bg-primary text-white py-3">
            <h5 class="card-title mb-0 text-center fs-4">Location Registration</h5>
          </div>
          <div class="card-body p-5">
            <form action="locationaction.php" method="post">
              <div class="mb-4">
                <label for="districtid" class="form-label fw-semibold">District</label>
                <select id="districtid" class="form-select form-select-lg" name="districtid" required>
                  <option value="" selected disabled>Choose District</option>
                  <?php
                  while($display = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $display["districtid"]; ?>">
                    <?php echo htmlspecialchars($display["districtname"]); ?>
                  </option>
                  <?php
                  }
                  ?> 
                </select>
              </div>
              
              <div class="mb-4">
                <label for="locationname" class="form-label fw-semibold">Location Name</label>
                <input type="text" name="locationname" class="form-control form-control-lg" id="locationname" 
                       placeholder="Enter location name" required maxlength="40">
              </div>

              <div class="d-grid gap-2 mt-4">
                <button type="submit" name="Submit" class="btn btn-primary btn-lg py-3 fs-5">Add Location</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'Footer.php'; ?>