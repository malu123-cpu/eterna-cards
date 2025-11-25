<?php
  include("Header.php");
  ?>
	<script src="../jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
            //alert("a")
			$("#category_id").change(function() {
               // alert("a")
				var categoryid = $(this).val();

                // alert(categoryid)

                
				$.ajax({
					url: "getcard.php",
					method: "POST",
					data: { category_id: categoryid },
					success: function(response) 
                    {
						$("#card").html(response);
					},
					error: function() 
                    {
						$("#card").html("Error occurred while getting card!");
					}
				});
			});
		});
	</script>



<body>
   
        <?php
        include_once("../dboperation.php");
        $sql="select * from tbl_category";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
        ?>


<div class="col-md-auto grid-margin stretch-card">
  <div class="card">
    <div class="container-fluid pt-4">
    <div class="card-body">
      <h4 class="card-title"><b><center>VIEW CARDS</center></b></h4>
      <p class="card-description">Select a Category to View Cards</p>
     
        <div class="form-group">
          
          <select class="form-control" name="category_id" id="category_id" onchange="this.form.submit()">
            <option value="">--------Select Category-----------</option>
            <?php
            while ($r = mysqli_fetch_array($result)) 
            { ?>
              <option value="<?php echo $r["category_id"]; ?>">
                <?php echo $r["Categoryname"]; ?>
              </option>
            <?php } ?>


          </select>
        </div>
      
   

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>Card Name</th>
        <th>No.of Copies</th>
        <th>Image 1</th>
        <th>Image 2</th>
        <th>Design Price</th>
        <th>Video</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="card">
     
      
     
    </tbody>
  </table>




  </div>
  </div>
</body>
</html>
 <?php
  include("Footer.php");
  ?>