
// Reset click

// Reset click island
$("#island").change(function(){
  if($(this)){
    $(".reset").slice(1, 5).find("option").prop("selected", false);
  // console.log(this);
  }
});

// // Reset click region
$("#region").change(function(){
  if($(this)){
    $(".reset").slice(2, 5).find("option").prop("selected", false);
  }
});

// // Reset click province
$("#province").change(function(){
  if($(this)){
    $(".reset").slice(3, 5).find("option").prop("selected", false);
  }
});

// Reset click

