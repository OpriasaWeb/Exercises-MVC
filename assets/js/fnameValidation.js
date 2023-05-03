
// Firstname validation
function getFname(){
  let fname = document.getElementById("firstname");
  let fnameValue = fname.value;

  let resultFname = document.getElementById("resultFname");
  // result.innerText = lnameValue;

  // create a regular expression to match against the user input
  var regexfName = /^[a-zA-Z.\s]*$/;

  if(!regexfName.test(fnameValue)){
    fname.style.fontWeight = 'bold';
    fname.style.color = 'red';
    resultFname.style.color = 'red';
    resultFname.innerText = "Ooops. Invalid input.";
  } else if(fnameValue === ''){
    fname.style.fontWeight = 'normal';
    resultFname.style.color = 'red';
    resultFname.innerText = '*required';
  } else{
    fname.style.fontWeight = 'normal';
    fname.style.color = 'black';
    resultFname.style.fontWeight = 'bold';
    resultFname.style.color = 'green';
    resultFname.innerText = "Valid input.";
  }
}
// Firstname validation