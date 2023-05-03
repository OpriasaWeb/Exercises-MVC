// ------------------------------------------------------- //


// Dialog pop
const closeButton = document.getElementById("close");
const dialog = document.getElementById("favDialog");

// Debugging if working correctly
function openCheck(dialog) {
  if (dialog.open) {
    console.log("Dialog open");
  } else {
    console.log("Dialog closed");
  }
}

// Show the light box containing the data inputted by the user
dialog.showModal();
openCheck(dialog);


// Form close button closes the dialog box
closeButton.addEventListener("click", () => {
  dialog.close();
  openCheck(dialog);

  setTimeout(function() {
    location.reload(true);
  }, 100);
});

// Dialog pop

// ------------------------------------------------------- //