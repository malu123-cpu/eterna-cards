<?php
	if(isset($_POST["category_id"])) 
	{
		$category_id = $_POST["category_id"];

		// You can replace this code with a database query to retrieve the states for the selected country
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
        <td>
        <a href="../Uploads2/<?php echo $row["video"]; ?>">view video</a>
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
