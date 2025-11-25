<?php
include("Header.php");
include_once("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["cardid"])) {
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

                            <input type="hidden" name="cardid" value="<?php echo $display["cardid"]; ?>">
                            <input type="hidden" name="existing_img1" value="<?php echo $display['img1']; ?>">
                            <input type="hidden" name="existing_img2" value="<?php echo $display['img2']; ?>">
                            <input type="hidden" name="existing_video" value="<?php echo $display['video']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Edit Card Name</label>
                                <input type="text" name="cardname" class="form-control" value="<?php echo $display["cardname"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Edit No. of Copies</label>
                                <input type="number" name="no_copies" class="form-control" value="<?php echo $display["no_copies"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Update Image 1</label><br>
                                <img src="../Uploads/<?php echo $display["img1"]; ?>" alt="image" style="width:120px;">
                                <input type="file" name="img1" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Update Image 2</label><br>
                                <img src="../Uploads/<?php echo $display["img2"]; ?>" alt="image" style="width:120px;">
                                <input type="file" name="img2" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Edit Design Price</label>
                                <input type="number" name="designprice" class="form-control" value="<?php echo $display["designprice"]; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Update Video</label><br>
                                <?php if(!empty($display["video"])) { ?>
                                    Current: <a href="../Uploads2/<?php echo $display["video"]; ?>" target="_blank"><?php echo $display["video"]; ?></a>
                                <?php } else { ?>
                                    <span class="text-muted">No video uploaded</span>
                                <?php } ?>
                                <input type="file" name="video" class="form-control mt-2">
                            </div>

                            <center>
                                <button type="submit" name="Submit" value="Submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary w-20" onclick="history.back()">Cancel</button>
                            </center>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("Footer.php");
?>
