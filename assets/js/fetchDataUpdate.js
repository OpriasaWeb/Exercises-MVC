
// Update / Edit 

$(document).ready(function(){
  $('.postEdit').click(function(e){
    e.preventDefault();
  
    const editDialog = document.getElementById("editDialog");
    const closeEdit = document.getElementById("closeEdit");
  
    // Show the light box containing the user record ready to update
    editDialog.showModal();
  
    //   // Debugging if working correctly
    function openCheck(editDialog) {
      if (editDialog.open) {
        console.log("Update dialog open");
      } else {
        console.log("Update dialog closed");
      }
    }
    // Call the openCheck for debugging
    openCheck(editDialog);
  
    // Debug
    console.log(id);
  
    // Edit/Update button variable
  
    // Form close button closes the dialog box
    closeEdit.addEventListener("click", () => {
      editDialog.close();
      // $(".reset").slice(0, 6).find("option").prop("selected", false);
      openCheck(editDialog);
    });
  
    var id = $(this).data('id');
    // var fullname = $('#fullname');
    // var completeAddress = $('#street');
    // var status = $('select[name="status"] option:selected').val();
  
    $.ajax({
      url: "./controller/userHandler.php",
      type: "POST",
      data: { 
        fetchData: true,
        fetchId: id
      },
      success: function(response) {
        const responseObject = JSON.parse(response);
        // console.log(responseObject);
        
        var accountId = responseObject.account.id;
        var accountName = responseObject.account.name;
        var accountStatus = responseObject.account.status;
        var accountAddress = responseObject.accountDetails.address;

        console.log(accountId, accountName, accountStatus, accountAddress);

        var splitAddress = accountAddress.split(",");

        for(let i = 0; i < splitAddress.length; i++){
          console.log(splitAddress[i]);
        }

        console.log(splitAddress[5]);

        if (accountStatus === 'active') {
          $('#spanStatus').addClass('active-status');
        } else {
          $('#spanStatus').addClass('inactive-status');
        }

        $('#id').val(accountId);
        $('#fullname').val(accountName);
        // $('#street').val(splitAddress[0]);
        $('#street').attr('placeholder', splitAddress[0]);
        $('#spanStatus').text(accountStatus);
        $('#status').val(accountStatus);

        $('#barangay').val(splitAddress[1]);
        $('#city').val(splitAddress[2]);
        $('#province').val(splitAddress[3]);
        $('#region').val(splitAddress[4]);
        $('#island').val(splitAddress[5]);

        // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //
        // $('#barangay').attr('placeholder', splitAddress[1]);
        // $('#city').attr('placeholder', splitAddress[2]);
        // $('#province').attr('placeholder', splitAddress[3]);
        // $('#region').attr('placeholder', splitAddress[4]);
        // $('#island').attr('placeholder', splitAddress[5]);

        // var islandValue = splitAddress[5];

        // var idIsland = 0;
        // if(islandValue === 'Luzon'){
        //   idIsland += 1;
        //   console.log("Island Luzon + " + idIsland);

        // } else if(islandValue === 'Visayas'){
        //   idIsland += 2;
        //   console.log("Island Visayas + " + idIsland);

        // } else{
        //   idIsland += 3;
        //   console.log("Island Mindanao + " + idIsland);

        // }

        // $('#island').val(idIsland);

        // Assuming the value of accountIsland is the ID of the selected island
        // var accountIsland = splitAddress[5];

        // Set the selected value of the island select element
        // $('#island').val(splitAddress[5]);

        // Trigger the change event on the island select element to populate the regions
        // $('#island').trigger('change');
        // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //

      },
      error: function(xhr, status, error){
        console.log(error); // xhr - XMLHttpRequest
      }
    })
  })
});

// Update / Edit