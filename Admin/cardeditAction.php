<?php
include_once("../dboperation.php");
$obj = new dboperation();

if (isset($_POST["Submit"])) {

    $id = $_POST['cardid'];
    $cardname = $_POST['cardname'];
    $nocopies = $_POST['no_copies'];
    $designprice = $_POST['designprice'];

    $existing_img1 = $_POST['existing_img1'];
    $existing_img2 = $_POST['existing_img2'];
    $existing_video = $_POST['existing_video'];

    $sql = "UPDATE tbl_card SET 
                cardname='$cardname', 
                no_copies='$nocopies', 
                designprice='$designprice'";

    if ($_FILES["img1"]["name"] != "") {
        $img1name = time() . "_" . $_FILES["img1"]["name"];
        move_uploaded_file($_FILES["img1"]["tmp_name"], "../Uploads/" . $img1name);
        $sql .= ", img1='$img1name'";
    } else {
        $sql .= ", img1='$existing_img1'";
    }

    if ($_FILES["img2"]["name"] != "") {
        $img2name = time() . "_" . $_FILES["img2"]["name"];
        move_uploaded_file($_FILES["img2"]["tmp_name"], "../Uploads/" . $img2name);
        $sql .= ", img2='$img2name'";
    } else {
        $sql .= ", img2='$existing_img2'";
    }

    if ($_FILES["video"]["name"] != "") {
        $videoname = time() . "_" . $_FILES["video"]["name"];
        move_uploaded_file($_FILES["video"]["tmp_name"], "../Uploads2/" . $videoname);
        $sql .= ", video='$videoname'";
    } else {
        $sql .= ", video='$existing_video'";
    }

    $sql .= " WHERE cardid='$id'";

    $result = $obj->executequery($sql);

    if ($result) {
        echo "<script>alert('Card updated successfully'); window.location.href='cardView.php';</script>";
    } else {
        echo "<script>alert('Update failed'); window.location.href='cardView.php';</script>";
    }
}
?>
