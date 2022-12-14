$(document).ready(function(){

   
    $("#signup_form").submit(function (e) {
        e.preventDefault();
        if ($("#username").val() && $("#pswd").val() && $("#firstName").val() && $("#lastName").val() && $("#age").val()) {
           
            sendRequset1($(this));
            console.log("HAjde radi!");
        } else {
            alert("All fields are required!");
        }
    });

    sendRequset1 = function ($form) {
                const $serialization = $form.serialize();
                console.log("Serialization: " + $serialization);
        
                request = $.ajax({
                  
                    url: "controller/sign_upController.php",
                    type: "POST",
                    data: $serialization
                });
        
                request.done(function (response, textStatus, jqXHR) {
                    console.log(response);
                    if (response == "success") {
                        alert("Uspešno ste se registrovali!");
                        document.getElementById("signup_form").reset();
                        //console.log();
                        //document.location.href = "pages/home.php";
                    } else {
                        alert("Registracija nije uspela!" );
                    }
                });
        
                request.fail(function (jqXHR, textStatus, error) {
                    alert("Error has occurred: " + error);
                });
            };

});

