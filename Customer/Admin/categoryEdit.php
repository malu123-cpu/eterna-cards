<?php
include("Header.php");
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_GET["category_id"])) 
{
  $cid=$_GET["category_id"];

   $sql="select * from tbl_category where category_id=$cid";
  $res=$obj->executequery($sql);
  $display=mysqli_fetch_array($res); 
}
?>
<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Category Update</h5>
              <div class="card">      
                <div class="card-body">
                  <form action="categoryeditAction.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label  class="form-label">Edit Your Name</label>
                      <input type="text" name="Categoryname" class="form-control" value="<?php echo $display["Categoryname"];?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Edit Your Description</label>
                      <textarea  class="form-control" name="Description"><?php echo $display["Description"];?></textarea>
                    </div>
                    
                    <div class="mb-3">
                      <label  class="form-label">Update Your Image</label><br>
                     
                         <img src="../Uploads/<?php echo $display["CategoryImg"];?>" alt="image" style="width:120px;">  
                        
                      <input type="file" id="CategoryImg" name="CategoryImg" class="form-control">
                    </div>
                     <input type="hidden" id="CategoryImg" name="category_id" class="form-control"  value="<?php echo $display["category_id"];?>">
                    <button type="submit" name="Submit" value="Submit" class="btn btn-primary" >Submit</button>
                    <button type="Cancel" class="btn btn-primary">Cancel</button>
                  </form>
                </div>
                </div>
               </div>
              </div>
        <?php
include("Footer.php");
?>
