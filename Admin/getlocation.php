<?php
if(isset($_POST["districtid"])) 
{
    $districtid = $_POST["districtid"];

    include_once("../dboperation.php");
    $sql="select * from tbl_location where districtid=$districtid";
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
    <td><?php echo $row["locationname"]; ?></td>
   
    <td>
      <a href="locationEdit.php?locationid=<?php echo $row["locationid"];?>" class="btn btn-primary btn-sm">Edit</a>
      <a href="locationDelete.php?locationid=<?php echo $row["locationid"];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
    </td>
</tr>
      
<?php
}
}
?>