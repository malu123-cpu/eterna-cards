<?php
include_once("../dboperation.php");
$obj = new dboperation();

if (isset($_POST['Submit'])) {

    $n = $_POST['category_id'];
    $d = $_POST['cardname'];
    $a = $_POST['no_copies'];

    $image1 = time() . "_" . $_FILES['img1']['name'];
    move_uploaded_file($_FILES['img1']["tmp_name"], "../Uploads/" . $image1);

    $image2 = time() . "_" . $_FILES['img2']['name'];
    move_uploaded_file($_FILES['img2']["tmp_name"], "../Uploads/" . $image2);

    $b = $_POST['designprice'];

    $video = time() . "_" . $_FILES['video']['name'];
    move_uploaded_file($_FILES['video']["tmp_name"], "../Uploads2/" . $video);

    $sql = "select * from tbl_card where cardname='$d'";
    $res = $obj->executequery($sql);
    $rows = mysqli_num_rows($res);

    if ($rows > 0) {
        echo "<script>alert('Already Exists'); window.location='card.php';</script>";
    } else {

        $sql = "INSERT INTO tbl_card (category_id, cardname, no_copies, img1, img2, designprice, video) 
                VALUES('$n', '$d', '$a', '$image1', '$image2', '$b', '$video')";

        $result = $obj->executequery($sql);

        if ($result) {
            echo "<script>alert('Successful'); window.location='card.php';</script>";
        } else {
            echo "<script>alert('Failed!');</script>";
        }
    }
}
?>
