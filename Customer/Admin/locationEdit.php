<?php
include("Header.php");
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_GET["locationid"])) 
{
  $id=$_GET["locationid"];

   $sql="select * from tbl_location where locationid=$id";
  $res=$obj->executequery($sql);
  $display=mysqli_fetch_array($res); 
}
?>
<div class="container-fluid">
        <div class="container-fluid pt-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4"><center>LOCATION UPDATE</center></h5>
              <div class="card">      
                <div class="card-body">
                  <form action="locationeditAction.php" method="POST">
                    <input type="hidden" name="locationid" class="form-control"  value="<?php echo $display["locationid"];?>">
                    <div class="mb-3">
                      <label  class="form-label">Edit Location Name</label>
                      <input type="text" name="locationname" class="form-control" value="<?php echo $display["locationname"];?>">
                    </div>
                    <center>
                    <button type="submit" name="Submit" class="btn btn-primary w-20">Submit</button>
                    <button type="button" class="btn btn-secondary w-20" onclick="history.back()">Cancel</button>
                    </center>
                  </form>
                </div>
                </div>
               </div>
              </div>
        <?php
include("Footer.php");
?>