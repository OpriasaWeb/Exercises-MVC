
// Last name validation
function editCompleteAddress(){
  let completeAddress = document.getElementById("completeAddress");
  let completeAddressValue = completeAddress.value;

  let validationCompleteAddress = document.getElementById("validationCompleteAddress");
  // result.innerText = lnameValue;

  // create a regular expression to match against the user input
  var regexCompleteAddress = /^[a-zA-Z.\s*]*$/;

  // regex for empty input by user
  var emptyInput = /\s*/;

  if(completeAddressValue == ""){
    validationCompleteAddress.style.fontSize = '0.8rem';
    validationCompleteAddress.style.color = 'red';
    validationCompleteAddress.innerText = "* required";
  }

  if(!regexCompleteAddress.test(completeAddressValue)){
    completeAddress.style.fontWeight = 'bold';
    completeAddress.style.color = 'red';
    validationCompleteAddress.style.fontSize = '0.8rem';
    validationCompleteAddress.style.color = 'red';
    validationCompleteAddress.innerText = "Ooops. Invalid input.";
  } else if(completeAddressValue === ''){
    completeAddress.style.fontWeight = 'normal';
    validationCompleteAddress.style.fontSize = '0.8rem';
    validationCompleteAddress.style.color = 'red';
    validationCompleteAddress.innerText = '*shouldn\'t be empty';
  } else{
    completeAddress.style.fontWeight = 'normal';
    completeAddress.style.color = 'black';
    validationCompleteAddress.style.fontSize = '0.8rem';
    validationCompleteAddress.style.fontWeight = 'bold';
    validationCompleteAddress.style.color = 'green';
    validationCompleteAddress.innerText = "Valid input.";
  }
}
// Last name validation