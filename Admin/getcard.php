<?php
	if(isset($_POST["category_id"])) 
	{
		$category_id = $_POST["category_id"];

		include_once("../dboperation.php");
        $sql="select * from tbl_card where category_id=$category_id";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
        $s=1;
?>

<?php
while($row=mysqli_fetch_array($result))
{
?>

<tr>
        <td><?php echo $s++; ?></td>
        <td><?php echo $row["cardname"]; ?></td>
        <td><?php echo $row["no_copies"]; ?></td>
        <td><img src="../Uploads/<?php echo $row["img1"];?> "alt="photo" style="width:120px; height: 80px;"> </td>
        <td><img src="../Uploads/<?php echo $row["img2"];?> "alt="photo" style="width:120px; height: 80px;"> </td>
        <td><?php echo $row["designprice"]; ?></td>
       <td class="text-center">
    <?php if(!empty($row["video"])) { ?>
        <video width="120" height="80" controls style="border-radius: 4px;">
            <source src="../Uploads2/<?php echo $row['video']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php } else { ?>
        <span class="text-muted">No Video</span>
    <?php } ?>
</td>
       
        <td>
          <a href="cardEdit.php?cardid=<?php echo $row["cardid"];?>" class="btn btn-primary">Edit</a>
          <a href="cardDelete.php?cardid=<?php echo $row["cardid"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
      </tr>
      
      
      
   <?php
}
	}
?>
