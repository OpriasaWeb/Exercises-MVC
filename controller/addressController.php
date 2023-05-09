<?php

include '../config/config.php';

$localaddress = new PDO(DSNA, DBUSERA, DBPASSA);
$localaddress->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// require_once("../config/config.php");
// $this->local = new PDO(DSNA, DBUSERA, DBPASSA);

// ------------------------------------------------------------ //

// Regions
try{
  // Regions
  if(isset($_POST['island_id'])){
    $islandId = $_POST['island_id'];
    $statement = $localaddress->query("SELECT * FROM region WHERE island_id = $islandId");
    // $statement = $pdo->query("SELECT * FROM region WHERE island_id = $islandId");
  
    ?>
    <select name="region" id="" class="reset" class="form-control">
      <option value="">Select region...</option>
      <?php
        while($row_region = $statement->fetch(PDO::FETCH_ASSOC)):
      ?>
        <option value="<?php echo htmlspecialchars($row_region['region_id']); ?>"><?php echo htmlspecialchars($row_region['region_name']); ?></option>
      <?php
        endwhile;
      ?>
    </select>
  
    <?php
  }
} catch(PDOException $e){
  throw $e;
}

try{
  // Provinces
  if(isset($_POST['region_id'])){ // from ajax
    $regionId = $_POST['region_id']; // from ajax
    $statement = $localaddress->query("SELECT * FROM province WHERE region_id = $regionId");
    // $fetchPrvnc = $fetchData->getProvince($regionId);
  
    ?>
    <select name="province" id="province" class="reset" class="province form-control">
      <option value="">Select province...</option>
      <?php
        while($row_province = $statement->fetch(PDO::FETCH_ASSOC)):
      ?>
        <option value="<?php echo htmlspecialchars($row_province['province_id']); ?>"><?php echo htmlspecialchars($row_province['province_name']); ?></option>
      <?php
        endwhile;
      ?>
    </select>
    
    <?php
  }
} catch(PDOException $e){
  throw $e;
}

try{
  // Cities
  if(isset($_POST['province_id'])){
    $provinceId = $_POST['province_id'];
    // $city_query = mysqli_query($connect, "SELECT * FROM city WHERE province_id = ");
    $statement = $localaddress->query("SELECT * FROM city WHERE province_id = $provinceId");
    // $fetchCt = $fetchData->getCity($provinceId);
  
    ?>
    <select name="city" id="city" class="reset" class="form-control">
      <option value="">Select city...</option>
      <?php
        while($row_city = $statement->fetch(PDO::FETCH_ASSOC)):
      ?>
        <option value="<?php echo htmlspecialchars($row_city['city_id']) ?>"><?php echo htmlspecialchars($row_city['city_name']) ?></option>
      <?php
        endwhile;
      ?>
    </select>
    
    <?php
  }
} catch(PDOException $e){
  throw $e;
}

try{
  // Barangay
  if(isset($_POST['city_id'])){
    $cityId = $_POST['city_id'];
    // $brgy_query = mysqli_query($connect, "SELECT * FROM barangay WHERE city_id = ");
  
    $statement = $localaddress->query("SELECT * FROM barangay WHERE city_id = $cityId");
    // $statement->execute();
  
    ?>
    <select name="brgy" id="brgy" class="reset" class="form-control">
      <option value="">Select barangay...</option>
      <?php
        while($row_brgy = $statement->fetch(PDO::FETCH_ASSOC)):
      ?>
        <option value="<?php echo htmlspecialchars($row_brgy['barangay_id']) ?>"><?php echo htmlspecialchars($row_brgy['barangay_name']) ?></option>
      <?php
        endwhile;
      ?>
    </select>
    <?php
    
  }
} catch(PDOException $e){
  throw $e;
}


?>