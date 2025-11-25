<?php
include('Header.php');
include_once("../dboperation.php");
$obj = new dboperation();
$sql = "SELECT * FROM tbl_district";
$result = $obj->executequery($sql);
?>
<script src="../jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $("#districtid").change(function () {
      var district_id = $(this).val();

      $.ajax({
        url: "getlocation.php",
        method: "POST",
        data: { districtid: district_id },
        success: function (response) {
          $("#locationname").html(response);
        },
        error: function () {
          $("#locationname").html("Error occurred while getting location!");
        }
      });
    });
  });
</script>
<style>
input, textarea, select {
    background-color: #f5f5f5 !important;
    color: #000 !important; 
    border-radius: 5px;
    padding: 10px;
    font-weight: normal;
    border: 1px solid #ddd;
    margin-bottom: 15px;
}
::placeholder {
    color: #666 !important; 
    font-weight: normal;
}
select option {
    color: #000 !important;  
    background-color: #f5f5f5 !important;
    font-weight: normal;
}
.fh5co-bg .overlay {
    background-color: rgba(0, 0, 0, 0.6);
}
.form-group {
    margin-bottom: 15px;
}
.btn {
    padding: 10px 30px;
    margin: 5px;
    border-radius: 5px;
}
</style>

<div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/img_bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 style="color: #fff; margin-bottom: 40px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Create Account</h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="registeraction.php" method="post" enctype="multipart/form-data" style="background: rgba(255,255,255,0.9); padding: 30px; border-radius: 10px;">
                    
                    <!-- Row 1: Name and Email -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="customername" name="customername" placeholder="Name" required minlength="3" maxlength="50" pattern="[A-Za-z\s]+">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required maxlength="100">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Row 2: Full Width Address -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" id="address" name="address" placeholder="Address" required minlength="5" maxlength="100" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Row 3: Contact and District -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" required pattern="[0-9]{10}" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="districtid" id="districtid" required>
                                    <option value="" disabled selected>Select District</option>
                                    <?php while ($r = mysqli_fetch_array($result)) { ?>
                                        <option value="<?php echo $r["districtid"]; ?>"><?php echo $r["districtname"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Row 4: Location and Pincode -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="locationname" id="locationname" required>
                                    <option value="" disabled selected>Select Location</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode" required min="100000" max="999999">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Row 5: Username and Password -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required minlength="4" maxlength="20" pattern="[A-Za-z0-9_]+">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="6" maxlength="20">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Row 6: Buttons -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('Footer.php');
?>