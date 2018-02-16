var isSet = true;
$(document).ready(function() {
//when return radio is clicked, display return datepicker
    $(function () {
        $("input[name='gridRadios']").click(function () {
            isSet = false;
            if ($("#gridRadios2").is(":checked")) {
                $("#return-date").hide();
                $('#return-dates').removeAttr('required');
                $('#return-dates').value('');                
            } else {
                $("#return-date").show();
            }
        });
    });
    
//checking if return date is before departure date
$('#next').submit(function(){
  var depDate = document.getElementById("departure-date"). value;
  var retDate = document.getElementById("return-dates"). value;  
    if (depDate >= retDate && isSet)
    {
        alert ("Return Date Must be at least 1 Day after Departure");
        return false;
    }
});

 $("#admin-login").click(function(){
        $("#login").show();
        $("#login1").show();

    });
});