<?php include 'Header.php';
include_once("../dboperation.php");
          $obj=new dboperation();

          $s=1;
          $sql = "SELECT * FROM tbl_category";
    $res = $obj->executequery($sql);
   ?>
<div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Category Table</h4>
                      <p class="card-subtitle">
                        Ample Admin Vs Pixel Admin
                      </p>
                    </div>
                    <div class="ms-auto mt-3 mt-md-9">
                      <select class="form-select theme-select border-0" aria-label="Default select example">
                        <option value="1">March 2025</option>
                        <option value="2">March 2025</option>
                        <option value="3">March 2025</option>
                      </select>
                    </div>
                  </div>000
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            Category id
                          </th>
                          <th scope="col" class="px-0 text-muted">Category name</th>
                          <th scope="col" class="px-0 text-muted">
                            Description
                          </th>
                             <th scope="col" class="px-0 text-muted">Category Image</th>
                          <th scope="col" class="px-0 text-muted">
                          <th scope="col" class="px-0 text-muted text-end">
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
  
  while($display=mysqli_fetch_array($res)) {

  
    ?>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="assets/images/profile/user-3.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder"><?php echo $s++;?></h6>
                                <span class="text-muted"></span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0"><?php echo $display["Categoryname"];?></td>
                          <td class="px-0"><?php echo $display["Description"];?></td>
                          <td>
                          <img src="../Uploads/<?php echo $display["CategoryImg"];?> "alt="photo" style="width:120px; height: 80px;"> </td>
                          

                           <td>
                        
                            <a href="categoryEdit.php?category_id=<?php echo $display["category_id"];?>" class="btn btn-primary">Edit</a>
                        

                        
                            <a href="categoryDelete.php?category_id=<?php echo $display["category_id"];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
  </td> </tr>

  <?php                  
 }
  ?>
  
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

<?php include 'Footer.php';
      ?>
