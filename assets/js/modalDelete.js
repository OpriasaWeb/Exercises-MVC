
// Update / Edit 

$('.postDelete').click(function(e){
  e.preventDefault();

  // Reload page function
  function reloadPage(){
    setTimeout(function() {
      location.reload(true);
    }, 0);
  }
  // Reload page function

  const deleteDialog = document.getElementById("deleteDialog");
  const closeDelete = document.getElementById("closeDelete");

  var id = $(this).val();

  // Put the modal over here

  // Debugging if working correctly
  function openCheck(deleteDialog) {
    if (deleteDialog.open) {
      console.log("Delete dialog open");
    } else {
      console.log("Delete dialog closed");
    }
  }

  // Show the light box containing the user record ready to update
  deleteDialog.showModal();
  openCheck(deleteDialog);

  // --- debug --- // 
  // alert(id);
  console.log(id);

  // Delete button variable
  var deleteRecord = $('#deleteRec');

  // if the delete button is click
  if(deleteRecord.click(function(e){
    e.preventDefault();
    // then do the jquery ajax request
    $.ajax({
      url: "./controller/userHandler.php",
      type: "POST",
      data: { 
        deleteRec: true,
        delete: id 
      },
      success: function(res){
        // $('#deleteDialog').close();
        deleteDialog.close();
        console.log(res);
        reloadPage();
        // Pop the check modal
          // and exit after 100 milisecs
      },
      error: function(xhr, status, error){
        console.log(error); // xhr - XMLHttpRequest
      }
    })
  }))

  // Debug
  // $('#deleteEx').click(function(e){
  //   e.preventDefault();

  //   deleteDialog.close();

  // })
  
    

  // Form close button closes the dialog box
  closeDelete.addEventListener("click", () => {
    deleteDialog.close();
    openCheck(deleteDialog);

    // setTimeout(function() {
    //   location.reload(true);
    // }, 0);

  });

});

// Update / Edit 
