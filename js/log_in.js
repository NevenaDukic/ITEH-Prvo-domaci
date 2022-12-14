$(document).ready(function(){

   
    $("#login_form").submit(function (e) {
        e.preventDefault();
        //console.log("HAjde radi!");
        if ($("#usernameL").val() && $("#pswdL").val()) {
            sendRequset($(this));
           
        } else {
            alert("All fields are required!");
        }
    });

    sendRequset = function ($form) {
                const $serialization = $form.serialize();
               // console.log("Serialization: " + $serialization);
        
                request = $.ajax({
                  
                    url: "controller/log_inController.php",
                    type: "POST",
                    data: $serialization
                });
        
                request.done(function (response, textStatus, jqXHR) {
                   console.log(response);
                    if (response == "success") {  
                       window.location.href = "pages/home.php";
                      
                    } else {
                        alert("Pogrešan username ili password!");
                    }
                });
        
                request.fail(function (jqXHR, textStatus, error) {
                    alert("Error has occurred: " + error);
                });
            };

});