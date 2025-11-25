<?php
include("Header.php");
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_GET["cardid"])) 
{
  $id=$_GET["cardid"];

   $sql="select * from tbl_card where cardid=$id";
  $res=$obj->executequery($sql);
  $display=mysqli_fetch_array($res); 
}
?>
<div class="container-fluid">
        <div class="container-fluid pt-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4"><center><b>CARD UPDATE</b></center></h5>
              <div class="card">      
                <div class="card-body">
                  <form action="cardeditAction.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label  class="form-label">Edit Card Name</label>
                      <input type="text" name="cardname" class="form-control" value="<?php echo $display["cardname"];?>">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Edit No. of Copies</label>
                      <input type="number" name="no_copies" class="form-control" value="<?php echo $display["no_copies"];?>">
                    </div>

                    <div class="mb-3">
                      <label  class="form-label">Update Image 1</label><br>
                      <img src="../Uploads/<?php echo $display["img1"];?>" alt="image" style="width:120px;">  
                      <input type="file" id="img1" name="img1" class="form-control">
                    </div>
                    <input type="hidden" id="img1" name="cardid" class="form-control"  value="<?php echo $display["cardid"];?>">

                    <div class="mb-3">
                      <label  class="form-label">Update Image 2</label><br>
                      <img src="../Uploads/<?php echo $display["img2"];?>" alt="image" style="width:120px;">  
                      <input type="file" id="img2" name="img2" class="form-control">
                    </div>
                    <input type="hidden" id="img2" name="cardid" class="form-control"  value="<?php echo $display["cardid"];?>">

                    <div class="mb-3">
                      <label class="form-label">Edit Design Price</label>
                      <input type="number" name="designprice" class="form-control" value="<?php echo $display["designprice"];?>">
                    </div>
       
                    <div class="mb-3">
                      <label  class="form-label">Update Video</label><br>
                      <a href="../Uploads2/<?php echo $display["video"];?>" type="video/mp4" style="width:120px"></a> 
                      <input type="file" id="video" name="video" class="form-control">
                    </div>
                    <input type="hidden" id="video" name="cardid" class="form-control"  value="<?php echo $display["cardid"];?>">
                    <center>
                    <button type="submit" name="Submit" value="Submit" class="btn btn-primary" >Submit</button>
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
