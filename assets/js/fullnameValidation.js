
// Last name validation
function editFullname(){
  let fullname = document.getElementById("fullname");
  let fullnameValue = fullname.value;

  let validationFullname = document.getElementById("validationFullname");
  // result.innerText = lnameValue;

  // create a regular expression to match against the user input
  var regexFullname = /^[a-zA-Z.\s*]*$/;

  // regex for empty input by user
  var emptyInput = /\s*/;

  if(fullnameValue == ""){
    validationFullname.style.fontSize = '0.8rem';
    validationFullname.style.color = 'red';
    validationFullname.innerText = "* required";
  }

  if(!regexFullname.test(fullnameValue)){
    fullname.style.fontWeight = 'bold';
    fullname.style.color = 'red';
    validationFullname.style.fontSize = '0.8rem';
    validationFullname.style.color = 'red';
    validationFullname.innerText = "Ooops. Invalid input.";
  } else if(fullnameValue === ''){
    fullname.style.fontWeight = 'normal';
    validationFullname.style.fontSize = '0.8rem';
    validationFullname.style.color = 'red';
    validationFullname.innerText = '*shouldn\'t be empty';
  } else{
    fullname.style.fontWeight = 'normal';
    fullname.style.color = 'black';
    validationFullname.style.fontSize = '0.8rem';
    validationFullname.style.fontWeight = 'bold';
    validationFullname.style.color = 'green';
    validationFullname.innerText = "Valid input.";
  }
}
// Last name validation