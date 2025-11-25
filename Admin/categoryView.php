<?php 
include 'Header.php';
include_once("../dboperation.php");
$obj = new dboperation();

$s = 1;
$sql = "SELECT * FROM tbl_category";
$res = $obj->executequery($sql);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Page Header -->
                    <div class="d-md-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="card-title mb-1">Category Catalog</h4>
                            <p class="card-subtitle text-muted">
                                Manage your product categories and their details
                            </p>
                        </div>
                        <div>
                            <a href="category.php" class="btn btn-primary">
                                <i class="ti ti-plus me-2"></i>Add New Category
                            </a>
                        </div>
                    </div>

                    <!-- Categories Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="8%">SL No</th>
                                    <th width="22%">Category Name</th>
                                    <th width="35%">Description</th>
                                    <th width="20%">Category Image</th>
                                    <th width="15%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($res) > 0): ?>
                                    <?php while($display = mysqli_fetch_array($res)): ?>
                                        <tr>
                                            <td class="fw-bolder"><?php echo $s++; ?></td>
                                            <td class="fw-medium"><?php echo htmlspecialchars($display["Categoryname"]); ?></td>
                                            <td class="text-muted"><?php echo htmlspecialchars($display["Description"]); ?></td>
                                            <td>
                                                <?php if(!empty($display["CategoryImg"])): ?>
                                                    <img src="../Uploads/<?php echo htmlspecialchars($display["CategoryImg"]); ?>" 
                                                         alt="<?php echo htmlspecialchars($display["Categoryname"]); ?>" 
                                                         class="rounded border" 
                                                         style="width: 120px; height: 80px; object-fit: cover;">
                                                <?php else: ?>
                                                    <span class="badge bg-light text-muted">No Image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="categoryEdit.php?category_id=<?php echo $display["category_id"]; ?>" 
                                                       class="btn btn-outline-primary btn-sm"
                                                       title="Edit Category">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <a href="categoryDelete.php?category_id=<?php echo $display["category_id"]; ?>" 
                                                       class="btn btn-outline-danger btn-sm" 
                                                       onclick="return confirm('Are you sure you want to delete <?php echo htmlspecialchars($display['Categoryname']); ?>? This action cannot be undone.')"
                                                       title="Delete Category">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="ti ti-category-off fs-1 opacity-50"></i>
                                                <p class="mt-3 mb-1 fw-medium">No Categories Found</p>
                                                <small class="d-block">Get started by adding your first category</small>
                                                <a href="category.php" class="btn btn-primary btn-sm mt-3">
                                                    <i class="ti ti-plus me-1"></i>Add Category
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>