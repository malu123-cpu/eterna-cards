<?php include 'Header.php'; 
include_once("../dboperation.php");
$obj=new dboperation();
$sqlquery="select * from tbl_category";
$result=$obj->executequery($sqlquery);

?>
<div class="body-wrapper-inner">
  <div class="container-fluid pt-4">
    <div class="card shadow-sm mt-4">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4 text-center"><b>CARD REGISTRATION</b></h5>
        <div class="card">
          <div class="card-body">
            <form action="cardaction.php"  method="post" enctype="multipart/form-data">
                 <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="category_id" class="form-select" name="category_id">
                          <option>Choose Category</option>
                             <?php
                      while($display=mysqli_fetch_array($result))
                      {
                      ?>
                      <option value="<?php echo $display["category_id"];?>"><?php echo $display["Categoryname"];?></option>
                      <?php
                      }
                      ?> 
                        </select>                      
                 </div>

                 <div class="mb-3">
                        <label for="cardname" class="form-label">Card Name</label>
                        <input type="text" name="cardname" class="form-control" id="cardname" required>
                 </div>
                 
                 <div class="mb-3">
                        <label for="no_copies" class="form-label">No. of Copies </label>
                        <input type="number" name="no_copies" class="form-control" id="no_copies" required>
                 </div>

                 <div class="mb-3">
                        <label for="img1" class="form-label">Image 1</label>
                        <input type="file" name="img1" class="form-control" id="img1" required>
                 </div>
                 
                 <div class="mb-3">
                        <label for="img2" class="form-label">Image 2</label>
                        <input type="file" name="img2" class="form-control" id="img2" required>
                 </div>
                 
                 <div class="mb-3">
                        <label for="designprice" class="form-label">Price of Design</label>
                        <input type="number" name="designprice" class="form-control" id="designprice" required>
                 </div>
                
                 <div class="mb-3">
                        <label for="video" class="form-label">Video</label>
                        <input type="file" name="video" class="form-control" id="video" required>
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
  </div>
</div>
<?php include 'Footer.php';
?>
