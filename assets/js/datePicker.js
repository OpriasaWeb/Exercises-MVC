
// Date picker
$(function(){
  var ageAllowed = new Date('2002-12-31'); // set the start date where the age bracket is allowed, 21 years old up.
  $("#datepicker").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-150:c', // year range from the current date going down to 150 numbers of years
    maxDate: ageAllowed // set to current date using JS object date
  });
});
// Date picker

