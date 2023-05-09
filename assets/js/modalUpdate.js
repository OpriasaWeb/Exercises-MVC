$(document).ready(function(e){
  // e.preventDefault();

  $('#updateRec').click(function(e){

    e.preventDefault();

    // Reload page function
    function reloadPage(){
      setTimeout(function() {
        location.reload(true);
      }, 0);
    }
    // Reload page function

    var id = $('#id').val();
    var fullname = $('#fullname').val();
    var status = $('select[name="status"] option:selected').val();

    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //
    // var ddrss = $('#address').val();
    // var islandName = $('select[name="slnd"] option:selected').text();
    // var regionName = $('select[name="rgn"] option:selected').text();
    // var provinceName = $('select[name="prvnc"] option:selected').text();
    // var cityName = $('select[name="ct"] option:selected').text();
    // var barangayName = $('select[name="brgy"] option:selected').text();

    // var full_address = ddrss + ", " + barangayName + ", " + cityName + ", " + provinceName + ", " + regionName + ", " + islandName;
    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //


    $.ajax({
      url: "./controller/userHandler.php",
      type: "POST",
      data: { 
        updateData: true,
        id: id,
        fullname: fullname,
        // fullAddress: full_address,
        status: status
      },
      success: function(response){
        console.log(response);
        editDialog.close();
        reloadPage();
      },
      error: function(error){
        console.log(error);
      }
    })

  })

})