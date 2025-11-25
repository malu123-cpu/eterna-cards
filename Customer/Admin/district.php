<?php include 'Header.php'; ?>
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="card shadow-sm mt-4">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4 text-center">DISTRICT REGISTRATION</h5>
        <div class="card">
          <div class="card-body">
            <form action="districtaction.php"  method="post" >
              <div class="mb-3">
                <label for="districtname" class="form-label">District Name</label>
                <input type="text" name="districtname" class="form-control" id="districtname" required>
              </div>
              
             <button type="submit" name="Submit" class="btn btn-primary w-100">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'Footer.php'; ?>
