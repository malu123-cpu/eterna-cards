<?php 
include 'header.php';
include_once("../dboperation.php");
$obj = new dboperation();
$cat=$_GET['category_id'];
$sql = "SELECT * FROM tbl_card where category_id='$cat'";
$res = $obj->executequery($sql);
?>

<div id="fh5co-gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
				<h2>Gallery</h2>
			</div>
		</div>
		<div class="row row-bottom-padded-md">
			<div class="col-md-12">
				<ul id="fh5co-gallery-list">
				<?php
				while ($display = mysqli_fetch_array($res)) { ?>
					<li class="one-third animate-box fadeIn animated-fast" 
						data-animate-effect="fadeIn" 
						style="background-image: url('../Uploads/<?php echo $display["img1"]; ?>'); "> 
						<a href="cardDetails.php?cardid=<?php echo $display["cardid"]; ?>">
							<div class="case-studies-summary">
								<span><b><?php echo $display["cardname"]; ?></b></span>
								<h2><?php echo $display["designprice"]; ?></h2>
							</div>
						</a>
					</li>
				<?php } ?>
				</ul>		
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';
?>
