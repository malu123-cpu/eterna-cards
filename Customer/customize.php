<?php 
include('header.php'); 
include_once("../dboperation.php");
$obj = new dboperation();
$sqlquery = "SELECT * FROM tbl_category";
$result = $obj->executequery($sqlquery);
?>

<div id="fh5co-started" class="fh5co-bg" style="background-image:url('images/couple-2.jpg'); position: relative;">
  <div class="overlay"></div>
  <div class="container" style="padding-top: 150px; padding-bottom: 100px;">
    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading" style="margin-top:-90px;">
      <h2>Customize Your Wedding Card 💌</h2>
      <p>Choose a style, add your message, and make it yours.</p>
    </div>

    <div class="col-md-8 col-md-offset-2">
      <form action="customizeaction.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Category</label>
          <select id="category_id" class="form-control" name="category_id" required>
            <option value="">Choose Category</option>
            <?php while($display=mysqli_fetch_array($result)) { ?>
              <option value="<?php echo $display["category_id"];?>" style="color:black">
                <?php echo $display["Categoryname"];?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Quantity</label>
          <input type="number" name="quantity" class="form-control" placeholder="Enter number of copies" required>
        </div>

        <div class="form-group">
          <label>Content</label>
          <textarea name="content" class="form-control" rows="4" placeholder="Enter the content for the card" required></textarea>
        </div>

        <div class="form-group">
          <label for="sample_design">Sample Design</label>
          <input type="file" name="sample_design" class="form-control" id="sample_design" required>
        </div>
        
        <div class="form-group">
          <label>Required Date</label>
          <input type="date" name="required_date" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Remark</label>
          <textarea name="remark" class="form-control" rows="4" placeholder="Remarks (optional)"></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
