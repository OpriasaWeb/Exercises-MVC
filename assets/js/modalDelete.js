
// Modal / dialog edit

function deleteModal(){
  const deleteDialog = document.getElementById("deleteDialog");
  const closeDelete = document.getElementById("closeDelete");

  // Debugging if working correctly
  function openCheck(deleteDialog) {
    if (deleteDialog.open) {
      console.log("Delete dialog open");
    } else {
      console.log("Delete dialog closed");
    }
  }

  // Show the light box containing the user record ready to update
  // deleteDialog.showModal();

  // Now, the modal delete showed
  if(deleteDialog.showModal()){
    // Update / Edit 
    $(document).ready(function(){
      $('#deleteRec').click(function(e){
        e.preventDefault();

        // NOTE: Get the id specifically
        // var deleteRecord = $(this).val(); // MALI 'TO

        $.ajax({
          url: "./controller/insertHandler.php",
          type: "POST",
          data: { 
            postDelete: true,
            delete: deleteRecord 
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
  }


  // openCheck(deleteDialog);


  // Form close button closes the dialog box
  closeDelete.addEventListener("click", () => {
    deleteDialog.close();
    openCheck(deleteDialog);

    setTimeout(function() {
      location.reload(true);
    }, 0);
  });
}

// Modal / dialog edit