<?php



?>

<!-- Include header -->
<?php
    include (APPROOT.'/view/header.php');
?>
<!-- Include header -->

<body>

  <div class="container m-5">
    <p class="fs-4 float-end">View info</p>
    <a href="http://localhost/mvc_project/index.php?module=show&action=insert" class="btn btn-info">Back</a>

    

    <table id="dataTable" class="table table-hover border-dark">
      <thead>
        <tr>
          <th>No#</th>
          <th>Name</th>
          <th>Address</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
        <?php
            foreach ($users as $key => $u):
        ?>
      <tbody>
        <tr>

          <th><?php echo $key + 1 ?></th>
          <td><?php echo $u['name'] ?></td>
          <td><?php echo $u['address'] ?></td>
          <td><?php echo $u['status'] ?></td>
          <td>
            <button value="<?php echo $u['id']; ?>" id="modalEdit" name="edit" onclick="editModal()" class="btn btn-sm btn-primary">Edit</button>
            <button value="<?php echo $u['id']; ?>" id="modalDelete" name="delete" onclick="deleteModal()" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr>
        <?php
            endforeach;
        ?>
      </tbody>
    </table>


    <!------- Last modal please ------->

    <!-- Edit modal/dialog -->
    <dialog id="editDialog">
      <form method="dialog">
        <button id="closeEdit" class="float-end" aria-label="close" formnovalidate>&times;</button>
        <section>
          <p class="fs-6">Update record <i class='bx bx-text'></i></p>
          <div class="updateRecord" id="updateRecord">
            <input type="hidden" name="id" id="id">
            <div class="mb-2">
              <label for="" class="form-label">Fullname</label>
              <input type="text" name="fullname" id="fullname" class="form-control" maxlength="32" minlength="2" onInput="editFullname()" required> 
              <span id="validationFullname"></span>
              <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
            </div>
            <div class="mb-2">
              <label for="" class="form-label">Address</label>
              <input type="text" name="completeAddress" id="completeAddress" class="form-control" maxlength="32" minlength="2" onInput="editCompleteAddress()" required> 
              <span id="validationCompleteAddress"></span>
              <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
            </div>
            <label for="currentStatus">Current status: <span class="bold"></span>active</label>
            <br>
            <label for="status">Status</label>
            <select class="reset form-select mb-3" name="status" id="status">
              <option disabled>Choose...</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
            <div class="mb-2">
              <button name="update" id="update" class="btn btn-sm btn-primary">Update</button>
            </div>
          </div>
        </section>
      </form>
    </dialog>
    <!-- Edit modal/dialog -->

    <!-- Delete modal/dialog -->
    <dialog id="deleteDialog">
      <form method="dialog">
        <button id="closeDelete" class="float-end" aria-label="close" formnovalidate>&times;</button>
        <section>
          <input type="hidden" name="id" id="id">
          <p class="fs-6">Delete record <i class='bx bx-message-square-minus'></i></p>
          <div class="deleteRecord" id="deleteRecord">
            <div class="mb-2">
              <p class="fs-5">Are you sure you want to delete this record?</p>
              <button name="deleteRec" id="deleteRec" class="btn btn-sm btn-danger">Delete</button>
            </div>
          </div>
        </section>
      </form>
    </dialog>
    <!-- Delete modal/dialog -->


    <!------- Last modal please ------->


  </div>
    
    <!-- Include header -->
  <?php
    include (APPROOT.'/view/footer.php');
  ?>
  <!-- Include header -->

  <script type="text/javascript">

    // DataTables
    $(document).ready(function () {
      $('#dataTable').DataTable();
    });
    // DataTables

    // ------------------------------------------------------- // 

    // Fullname validation
    <?php 
        include(APPROOT.'/assets/js/fullnameValidation.js'); 
    ?>
    // Fullname validation

    // Complete address validation
    <?php 
        include(APPROOT.'/assets/js/completeAddressValidation.js'); 
    ?>
    // Complete address validation

    // ------------------------------------------------------- // 

    // Modal edit
    <?php 
        include(APPROOT.'/assets/js/modalEdit.js'); 
    ?>
    // Modal edit

    // Model delete
    <?php 
        include(APPROOT.'/assets/js/modalDelete.js'); 
    ?>
    // Model delete

  </script>
  
  
  
</body>
</html>