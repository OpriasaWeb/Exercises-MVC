
// Update / Edit 

$(document).ready(function(){
  $('#edit').click(function(e){
    e.preventDefault();

    var fullname = $('#fullname');
    var fullAddress = $('#completeAddress');
    var status = $('#status');

    $.ajax({
      url: "./controller/insertHandler.php",
      type: "POST",
      data: { 
        fullname: fullname,
        fullAddress: fullAddress,
        status: status
      },
      success: function(res){
        console.log(res);
      },
      error: function(xhr, status, error){
        console.log(error); // xhr - XMLHttpRequest
      }
    })
  })
});

// Update / Edit 


// Modal / dialog edit

function editModal(){
  const editDialog = document.getElementById("editDialog");
  const closeEdit = document.getElementById("closeEdit");

  // Debugging if working correctly
  function openCheck(editDialog) {
    if (editDialog.open) {
      console.log("Update dialog open");
    } else {
      console.log("Update dialog closed");
    }
  }

  // Show the light box containing the user record ready to update
  editDialog.showModal();
  openCheck(editDialog);


  // Form close button closes the dialog box
  closeEdit.addEventListener("click", () => {
    editDialog.close();
    openCheck(editDialog);

    setTimeout(function() {
      location.reload(true);
    }, 0);
  });

}

// Modal / dialog edit