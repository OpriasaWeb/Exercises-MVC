
// Prevent bad input of address
function addressInput(){
  let inputAddress = document.getElementById("address");
  let addressValue = inputAddress.value;

  let resultAddress = document.getElementById("resultAddress");
  // result.innerText = lnameValue;

  // regex for address
  var addressRegex = /^[a-zA-Z0-9\s,'-.]*$/;

  if(!addressRegex.test(addressValue)){
    inputAddress.style.fontWeight = 'bold';
    inputAddress.style.color = 'red';
    resultAddress.style.color = 'red';
    resultAddress.innerText = "Ooops. Invalid input.";
  } else if(addressValue === ''){
    inputAddress.style.fontWeight = 'normal';
    resultAddress.style.color = 'red';
    resultAddress.innerText = '*required';
  } else{
    inputAddress.style.fontWeight = 'normal';
    inputAddress.style.color = 'black';
    resultAddress.style.fontWeight = 'bold';
    resultAddress.style.color = 'green';
    resultAddress.innerText = "Valid input.";
  }
}
// Prevent bad input of address
