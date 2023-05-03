
// Last name validation
function getLname(){
  let lname = document.getElementById("lastname");
  let lnameValue = lname.value;

  let result = document.getElementById("resultLname");
  // result.innerText = lnameValue;

  // create a regular expression to match against the user input
  var regex = /^[a-zA-Z.\s*]*$/;

  // regex for empty input by user
  var emptyInput = /\s*/;

  if(lnameValue == ""){
    result.style.color = 'red';
    result.innerText = "* required";
  }

  if(!regex.test(lnameValue)){
    lname.style.fontWeight = 'bold';
    lname.style.color = 'red';
    result.style.color = 'red';
    result.innerText = "Ooops. Invalid input.";
  } else if(lnameValue === ''){
    lname.style.fontWeight = 'normal';
    result.style.color = 'red';
    result.innerText = '*required';
  } else{
    lname.style.fontWeight = 'normal';
    lname.style.color = 'black';
    result.style.fontWeight = 'bold';
    result.style.color = 'green';
    result.innerText = "Valid input.";
  }
}
// Last name validation