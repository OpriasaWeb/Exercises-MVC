<?php

require_once("./config/config.php");
$localaddress = new PDO(DSNA, DBUSERA, DBPASSA);
$localaddress->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!-- Include header -->
<?php
    include (APPROOT.'/view/header.php');
?>
<!-- Include header -->


<body class="show" id="show">

  <div class="container m-5">
    <p class="fs-4 float-end">View info</p>
    <a href="http://localhost/mvc_project/index.php?module=home&action=insert" class="btn btn-info">Back</a>

    

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
            <button value="<?php echo $u['id']; ?>" data-id="<?php echo $u['id']; ?>" id="modalEdit" name="edit" class="postEdit btn btn-sm btn-outline-primary">Edit</button>
            <button value="<?php echo $u['id']; ?>" id="modalDelete" name="delete" class="postDelete btn btn-sm btn-outline-danger">Delete</button>
            <!-- onclick="editModal()" / onclick="deleteModal()" -->
          </td>
        </tr>
        <?php
          endforeach;
        ?>
        <!-- endforeach -->
      </tbody>
    </table>


    <!------- Last modal please ------->

    <!-- Edit modal/dialog -->
    <dialog id="editDialog">
      <!-- <form method="dialog"> -->
      <button id="closeEdit" class="float-end" aria-label="close" formnovalidate>&times;</button>
      <section>
        <p class="fs-6">Update record <i class='bx bx-text'></i></p>
        
        <div class="updateRecord" id="updateRecord">

          <input type="hidden" name="id" id="id">

          <label for="currentStatus">Current status: <span class="bold" id="spanStatus"></span></label>
          <br>

          <div class="mb-2">
            <label for="" class="form-label">Fullname</label>
            <input type="text" name="fullname" id="fullname" class="form-control" maxlength="32" minlength="2" onInput="editFullname()"> 
            <span id="validationFullname"></span>
            <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
          </div>

          <!-- ---------- TEST and DEBUGGING (Complete address update) if sir ask ---------- -->

          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Change address?
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div id="mb-2">
                    <label for="island">Island</label>
                    <!-- <span id="resultIsland"><?php echo $requiredMessage ?></span> -->
                    <span id="resultIsland"></span>
                    <select id="island" name="slnd" class="reset form-select mb-3">
                      <option value="" selected disabled>Select an island...</option>

                      <!-- Fetching island from database using while loop -->
                      <?php
                        // $pwconn = $localdb->pwcconn();
                        // fetching island data from db
                        $islandData = "SELECT * FROM address.island";
                        $island_stmt = $localaddress->query($islandData);

                        $island_stmt->execute();
                        // var_dump($islandData);
                        // echo $island;
                        while($island = $island_stmt->fetch(PDO::FETCH_ASSOC)){
                      ?>
                        <option value="<?php echo htmlspecialchars($island['island_id'])?>"><?php echo htmlspecialchars($island['island_name'])?></option>
                      <?php
                        }
                      ?>
                        
                      <!-- Fetching island from database using while loop -->
                      
                    </select>
                  </div>

                  <div class="mb-2">
                  <label for="region">Region</label>
                    <span id="resultRegion"></span></span>
                    <select class="reset form-select mb-3" name="rgn" id="region" placeholder="Select region...">
                      <option disabled>Select region...</option>
                    </select>
                  </div>

                  <div class="mb-2">
                    <label for="province">Province</label>
                    <span id="resultProvince"></span></span>
                    <select class="reset province form-select mb-3" name="prvnc" id="province">
                      <option disabled>Select province...</option>
                    </select>
                  </div>

                  <div class="mb-2">
                    <label for="city">City</label>
                    <span id="resultCity"></span></span>
                    <select class="reset form-select mb-3" name="ct" id="city">
                      <option disabled>Select city...</option>
                    </select>
                  </div>

                  <div class="mb-2">
                    <label for="barangay">Barangay</label>
                    <span id="resultBarangay"></span></span>
                    <select class="reset form-select mb-3" name="brgy" id="barangay">
                      <option disabled>Select barangay...</option>
                    </select>
                  </div>

                  <div class="mb-2">
                    <label for="" class="form-label">Bldg/Blk/Lot/Subd</label>
                    <input type="text" name="street" id="street" class="form-control" maxlength="32" minlength="2" onInput="editCompleteAddress()" > 
                    <span id="validationCompleteAddress"></span>
                    <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- -->

          <label for="status">Status</label>
          <select class="reset form-select mb-3" name="status" id="status">
            <option disabled>Choose...</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
          <div class="mb-2">
            <button name="updateRec" id="updateRec" class="updateRec btn btn-sm btn-primary">Update</button>
          </div>
        </div>
      </section>
      <!-- </form> -->
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
              <button name="deleteRec" id="deleteRec" class="deleteRec btn btn-sm btn-danger">Delete</button>
              <!-- <button name="deleteEx" id="deleteEx" class="deleteRec btn btn-sm btn-warning">Example</button> // Debug -->
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

    // Dynamic select address
    <?php 
        include(APPROOT.'/assets/js/dynamicSelect.js'); 
    ?>
    // Dynamic select address

    // Reset click
    <?php 
        include(APPROOT.'/assets/js/resetClick.js'); 
    ?>
    // Reset click

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

    // Modal fetch data
    <?php 
        include(APPROOT.'/assets/js/fetchDataUpdate.js'); 
    ?>
    // Modal fetch data

    // Modal edit
    <?php 
        include(APPROOT.'/assets/js/modalUpdate.js'); 
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