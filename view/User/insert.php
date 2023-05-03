

<!-- View -->

<?php

// view represents the user interface of the application.

// PWC
// $pwcconn = new PDO('mysql:host=pwc-sapkdbsta57.mysql.database.azure.com;dbname=newtestdb', 'newtestuser@pwc-sapkdbsta57', 'nuser08162022!');
// $pwcconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once("./config/config.php");
$localaddress = new PDO(DSNA, DBUSERA, DBPASSA);
$localaddress->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// $localaddress = new PDO('mysql:host=localhost;dbname=address', 'root', '@raym33B3m14');
// $localaddress->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Local
// $local = new PDO('mysql:host=localhost;dbname=tutorial', 'root', '@raym33B3m14');
$local = new PDO(DSN, DBUSER, DBPASS);
$local->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>


<!-- Include header -->
<?php
    include (APPROOT.'/view/header.php');
?>
<!-- Include header -->

<body>
  <div class="container">
    <div class="m-5">
    <p class="fs-4">PhilWeb exercises</p>
    <a href="http://localhost/mvc_project/index.php?module=show&action=showall" class="btn btn-success float-end">View info</a>
    </div>
  </div>

  <div class="input-section">
    <div class="container-input">
      <div class="mb-3">
        <label for="" class="form-label">Lastname <span class="limitation">(Only letters, period and space are allowed)</span></label>
        <input type="text" name="lname" id="lastname" class="form-control" maxlength="32" minlength="2" onInput="getLname()" required> 
        <span id="resultLname"></span>
        <!-- pattern="^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Firstname <span class="limitation">(Only letters, period and space are allowed)</span></label>
        <input type="text" name="fname"  id="firstname" class="form-control" maxlength="32" minlength="2" onInput="getFname()" required>
        <span id="resultFname"></span></span>
        <!-- pattern=^[^~!$%^?]$" title="Only the letters, period and space are allowed." -->
      </div>
      <p class="fs-5 text-bold">Address</p>

      <!-- Account id increment -->
      <?php
      $sql = "SELECT account_id FROM tutorial.accountdetails ORDER BY account_id DESC LIMIT 1";
      $statement = $local->query($sql);
      // $statement->execute();
      if ($statement && $statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $accId = intval($row['account_id']);
        $accId + 1;
      }
      ?>
      <!-- Account id increment -->

      <input type="hidden" name="account_id" id="account_id" value="<?php echo $accId + 1; ?>">

      <input type="hidden" name="status" id="status" value="active">

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
      

      <label for="region">Region</label>
      <span id="resultRegion"></span></span>
      <select class="reset form-select mb-3" name="rgn" id="region" placeholder="Select region...">
        <option disabled>Select region...</option>
      </select>
      

      <label for="province">Province</label>
      <span id="resultProvince"></span></span>
      <select class="reset province form-select mb-3" name="prvnc" id="province">
        <option disabled>Select province...</option>
      </select>
      

      <label for="city">City</label>
      <span id="resultCity"></span></span>
      <select class="reset form-select mb-3" name="ct" id="city">
        <option disabled>Select city...</option>
      </select>
      

      <label for="barangay">Barangay</label>
      <span id="resultBarangay"></span></span>
      <select class="reset form-select mb-3" name="brgy" id="barangay">
        <option disabled>Select barangay...</option>
      </select>
      

      <div class="mb-3">
        <label for="" class="form-label">Bldg/Blk/Lot/Subd</label>
        <input type="text" onInput="addressInput()" name="ddrss" id="address" class="address form-control">
        <!-- pattern="^[a-zA-Z0-9\s,'-]*$" title="!, $, %, ^ are not allowed" -->
        <span id="resultAddress"></span></span>
        
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Gender</label>
        <select id="gender" name="gndr" class="gender form-select" aria-label="Default select example">
          <option value="">Choose...</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        <!-- <option value="No">I'd rather not to say</option> -->
        </select>
        <span id="resultGender"></span></span>
        
      </div>

      <div class="mb-3">
        <label>Birthdate <span class="limitation">(21 above are allowed)</span></label>
        <input type="text" name="birthdate" id="datepicker" class="birthdate form-control" placeholder="Date..">
        <span id="resultBirthdate"></span></span>
      </div>

      <div class="form-group">
        <button type="submit" name="insert" id="insert" class="btn btn-primary float-end m-5" onclick="displayData()">Submit</button>
        <!-- <input type="submit" value="Submit" name="insert" id="insert" class="btn btn-success btn-block mt-5 float-end" onclick="displayData()"> -->
      </div>
      
      
      <!-- <button type="submit" name="info" id="newUser" class="btn btn-primary float-end mb-3" onclick="displayData()">Submit</button> -->

      
    <!-- </form> -->
    </div>
  </div>

  <!-- Last modal please -->
  <!-- Simple pop-up dialog box, containing a form -->
  <dialog id="favDialog">
    <form method="dialog">
      <button id="close" class="float-end" aria-label="close" formnovalidate>&times;</button>
      <section>
        <p class="fs-4">View info</p>
        <div class="viewInfo" id="viewInfo">
        
        </div>
      </section>
    </form>
  </dialog>
  <!-- Last modal please -->


  <!-- --------------------------------------------------------------------------- -->
  
<?php
    include (APPROOT.'/view/footer.php');
?>


  <!-- Date picker -->
  <script type="text/javascript">

    // Prevent the bad input in names
    <?php 
        include(APPROOT.'/assets/js/lnameValidation.js'); 
    ?>

    <?php 
        include(APPROOT.'/assets/js/fnameValidation.js'); 
    ?>
    // Prevent the bad input in names

    // Prevent bad input of address
    <?php 
        include(APPROOT.'/assets/js/addressValidation.js'); 
    ?>
    // Prevent bad input of address

    // ---------------------------------------------------------- //

    // Form button display data
    <?php 
        include(APPROOT.'/assets/js/displayData.js'); 
    ?>
    // Form button display data

    // ---------------------------------------------------------- //

    // Date picker
    <?php 
        include(APPROOT.'/assets/js/datePicker.js'); 
    ?>
    // Date picker

    // ---------------------------------------------------------- //

    // Dynamic select
    <?php 
        include(APPROOT.'/assets/js/dynamicSelect.js'); 
    ?>
    // Dynamic select

    // ---------------------------------------------------------- //

    // Reset click
    <?php 
        include(APPROOT.'/assets/js/resetClick.js'); 
    ?>
    // Reset click

    // ---------------------------------------------------------- //
    
    // Insert data
    <?php 
        include(APPROOT.'/assets/js/insertRecord.js'); 
    ?>
    // Insert data

  </script>
  
</body>
</html>
<!-- View -->



