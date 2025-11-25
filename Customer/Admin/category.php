<?php include 'Header.php'; ?>
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="card shadow-sm mt-4">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4 text-center">Category Registration</h5>
        <div class="card">
          <div class="card-body">
            <form action="categoryAction.php"  method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" name="Categoryname" class="form-control" id="categoryName" required>
              </div>
              <div class="mb-3">
                <label for="categoryDescription" class="form-label">Description</label>
                <textarea class="form-control" name="Description" id="categoryDescription" rows="4" required></textarea>
              </div>
              
              <div class="mb-3">
                <label for="categoryimage" class="form-label">Category Image</label>
                <input type="file" name="Categoryimg" class="form-control" id="Categoryimg" required>

              </div>
             <button type="submit" name="Submit" class="btn btn-primary w-100">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'Footer.php'; ?>
