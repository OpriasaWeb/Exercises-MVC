

//#insert
$(document).ready(function(){

    $('#insert').click(function(e){
        e.preventDefault();

        var lname= $('#lastname').val();
        var fname= $('#firstname').val();
        
        var ddrss = $('#address').val();
        var islandName = $('select[name="slnd"] option:selected').text();
        var regionName = $('select[name="rgn"] option:selected').text();
        var provinceName = $('select[name="prvnc"] option:selected').text();
        var cityName = $('select[name="ct"] option:selected').text();
        var barangayName = $('select[name="brgy"] option:selected').text();

        // Insert account
        var fullname = fname + " " + lname;
        var status= $('#status').val();

        // Insert accountdetails
        var account_id = $('#account_id').val();
        var full_address = ddrss + ", " + barangayName + ", " + cityName + ", " + provinceName + ", " + regionName + ", " + islandName;
        var gender = $('#gender').val();


        console.log(fullname, status, account_id, full_address, gender);

        if(fullname !== ''){
            $.ajax({
                url: "./controller/insertHandler.php",
                type: "POST",
                data: {
                    fullname: fullname,
                    status: status,
                    account_id: account_id,
                    full_address: full_address,
                    gender: gender
                },
                success: function(res){
                    console.log(res);
                }
                // error: function(error) {
                //     // Handle any errors that occur during the AJAX request
                //     console.log('Error: ' + error);
                // }
            })
        } else{
            // Handle the case where one or both fields are empty
            alert('Please enter your first and last name');
        }

        

    })

})

