<?php 
include 'header.php';
include_once("../dboperation.php");
$obj = new dboperation();

$cardid = $_GET['cardid'];
$sql = "SELECT * FROM tbl_card WHERE cardid='$cardid'";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
?>    

<div id="fh5co-services" class="fh5co-section-gray" style="padding-top:50px; padding-bottom:50px;">
    <div class="container">
<br><br><br>
        <!-- Main heading styled like "We Offer Services" -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Card Details and Booking</h2>
            </div>
        </div>

        <div class="row">
            <!-- Left side: Card images stacked -->
            <div class="col-md-7 text-center">
                <img src="../Uploads/<?php echo $display["img1"]; ?>" 
                     class="img-responsive" 
                     style="height:300px; width:300px; object-fit:cover; margin-bottom:15px;">
                
                <img src="../Uploads/<?php echo $display["img2"]; ?>" 
                     class="img-responsive" 
                     style="height:300px; width:300px; object-fit:cover; margin-bottom:15px;">
                     
                <div class="col-md-8 col-md-offset-1">
                    <h3><?php echo $display["cardname"]; ?></h3>
                    <p><b>Price: ₹<?php echo $display["designprice"]; ?></b></p>
                </div>
            </div>

            <!-- Right side: Input form -->
            <div class="col-md-5">
                <form action="cardDetailsAction.php" method="post">
                    <input type="hidden" name="cardid" value="<?php echo $display['cardid']; ?>">

                    <div class="form-group">
                        <label>Required Date</label>
                        <input type="date" name="requireddate" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>No of Copies</label>
                        <input type="number" name="no_copies" class="form-control" placeholder="Enter number of copies" required>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" rows="4" placeholder="Enter the content for the card" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Review / Correction</label>
                        <input type="text" name="review" class="form-control" placeholder="Enter review or correction if any">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">BUY NOW</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';
?>
