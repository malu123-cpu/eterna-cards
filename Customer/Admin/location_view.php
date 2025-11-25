<?php
include("Header.php");
include_once("../dboperation.php");
$obj = new dboperation();

// Fetch all locations ordered by locationid
$locations = $obj->executequery("SELECT * FROM tbl_location ORDER BY locationid ASC");
?>

<div class="container-fluid pt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Location List</h5>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Location Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $s = 1;
                    if ($locations && mysqli_num_rows($locations) > 0) {
                        while ($loc = mysqli_fetch_assoc($locations)) {
                            $locationId = $loc['locationid'] ?? '';
                            $locationName = htmlspecialchars($loc['locationname'] ?? '');

                            // Only show rows with valid data
                            if ($locationId != '') {
                                echo "<tr>
                                    <td>{$s}</td>
                                    <td>{$locationName}</td>
                                    <td>
                                        <a href='locationEdit.php?locationid={$locationId}' class='btn btn-primary btn-sm'>Edit</a> 
                                        <a href='locationDelete.php?locationid={$locationId}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                                    </td>
                                </tr>";
                                $s++;
                            }
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>No locations found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include("Footer.php"); ?>
