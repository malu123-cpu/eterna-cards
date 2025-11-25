<?php include 'Header.php'; 
include_once("../dboperation.php");
$obj=new dboperation();
$sqlquery="select * from tbl_district";
$result=$obj->executequery($sqlquery);

?>
?>
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="card shadow-sm mt-4">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4 text-center">Location Registration</h5>
        <div class="card">
          <div class="card-body">
            <form action="locationaction.php"  method="post">
                 <div class="mb-3">
                        <label for="district" class="form-label">District</label>
                        <select id="districtid" class="form-select" name="districtid">
                          <option>Choose District</option>
                             <?php
                      while($display=mysqli_fetch_array($result))
                      {
                      ?>
                      <option value="<?php echo $display["districtid"];?>"><?php echo $display["districtname"];?></option>
                      <?php
                      }
                      ?> 

                        </select>
                        
                      </div>
              <div class="mb-3">
                <label for="locationname" class="form-label">Location Name</label>
                <input type="text" name="locationname" class="form-control" id="locationname" required>
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
