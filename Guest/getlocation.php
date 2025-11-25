<?php
	if(isset($_POST["districtid"])) 
	{
		$districtid = $_POST["districtid"];

		include_once("../dboperation.php");
            $obj=new dboperation();
        $sql="select * from tbl_location where districtid=$districtid";
        $res=$obj->executequery($sql);
?>

<option value="">Select Location</option>
  <?php
            while ($r= mysqli_fetch_array($res)) 
            { ?>
              <option value="<?php echo $r["locationid"]; ?>">
                <?php echo $r["locationname"]; ?>
              </option>
            <?php } ?>
      
      
      <?php
}
	
?>