
// Dynamic select
$(document).ready(function(){
  // Region
  $("#island").change(function(){

    var islandId = $(this).val();

    $.ajax({
      url: "./controller/placesController.php",
      method: 'POST',
      data:{
        island_id: islandId
      },
      success:function(data){
        $("#region").html(data);
      }
    });
  });

  // Province
  $("#region").change(function(){
    // var islandId = $("#island").val();
    var regionId = $(this).val();
    $.ajax({
      url: "./controller/placesController.php",
      method: 'POST',
      data:{
        region_id: regionId
      },
      success:function(data){
        $("#province").html(data);
      }
    });
  });

  // City
  $("#province").change(function(){
    var provinceId = $(this).val();
    $.ajax({
      url: "./controller/placesController.php",
      method: 'POST',
      data:{
        province_id: provinceId
      },
      success:function(data){
        $("#city").html(data);
      }
    });
  });

  // Barangay
  $("#city").change(function(){
    var cityId = $(this).val();
    $.ajax({
      url: "./controller/placesController.php",
      method: 'POST',
      data:{
        city_id: cityId
      },
      success:function(data){
        $("#barangay").html(data);
      }
    });
  });

});
// Dynamic select


