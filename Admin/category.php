<?php include 'Header.php'; ?>

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-xl-10">
        <div class="card shadow-sm mt-4">
          <div class="card-header bg-primary text-white py-3">
            <h5 class="card-title mb-0 text-center fs-4">Category Registration</h5>
          </div>
          <div class="card-body p-5">
            <form action="categoryAction.php" method="post" enctype="multipart/form-data">
              <div class="mb-4">
                <label for="categoryName" class="form-label fw-semibold">Category Name</label>
                <input type="text" name="Categoryname" class="form-control form-control-lg" id="categoryName" 
                       placeholder="Enter category name" required maxlength="50">
              </div>
              
              <div class="mb-4">
                <label for="categoryDescription" class="form-label fw-semibold">Description</label>
                <textarea class="form-control" name="Description" id="categoryDescription" 
                          rows="5" placeholder="Enter category description" required maxlength="255"></textarea>
              </div>
              
              <div class="mb-4">
                <label for="categoryImage" class="form-label fw-semibold">Category Image</label>
                <input type="file" name="Categoryimg" class="form-control" id="categoryImage" 
                       accept="image/*" required>
                <div class="form-text">Accepted formats: JPG, PNG, GIF. Max size: 2MB</div>
              </div>
              
              <div class="d-grid gap-2 mt-4">
                <button type="submit" name="Submit" class="btn btn-primary btn-lg py-3 fs-5">Add Category</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'Footer.php'; ?>