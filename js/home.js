$(document).ready(function () {

   
    $("#find_predstave").submit(function (e) {
        e.preventDefault();
     
        sendRequset($(this));
       
        
    });
    

    sendRequset = function ($form) {
        const $serialization = $form.serialize();
            request = $.ajax({
                url: "../controller/find.php",
                type: "POST",
                data: $serialization
            });
        request.done(function (response, textStatus, jqXHR) {
            console.log(response);
            data = JSON.parse(response);
            fillTable(data);
           

        });   
    };
    function fillTable($data){
        $("#dataTable > tbody").html("");
       
        console.log($data);
        data.forEach(element => {
            var parts = element["datum"].split('-'); 
            $('#dataTable').append(
                "<tr>" +
                "<td>" + '<button type="button" class="btn">Rezervisi kartu</button>' + "</td>" + 
                "<td>" + element["id"] + "</td>" +
                "<td>" + element["naziv"] + "</td>" +
                "<td>" + parts[2] + "." + parts[1] + "." + parts[0]+ "</td>" +
                "<td>" + element["brojSlMesta"] + "</td>" +
                "</tr>"
            );
        });
    }

    // $('.btn').on("click", function(){ 
    $(document).on('click','.btn', function(e) {
        console.log("Poziva se");
        var row = $(this).closest('tr');
        var value = $(this).closest('tr').find('td:eq(1)').text();
        console.log(value);
        var newNum = parseInt($(this).closest('tr').find('td:eq(4)').text())-parseInt(1);
        var el =  $(this).closest('tr').find('td:eq(4)');
        console.log(newNum);
        

        sendReqForUpdate(value,el,newNum);
    });
   
    function sendReqForUpdate($value,$el,$newNum){

        console.log($value);
       
        request = $.ajax({
            url: "../controller/find.php",
            type: "GET",
            data: {'value' : $value}
        });

        request.done(function (response, textStatus, jqXHR) {
           if(response=="upisao"){
            console.log("Novi broj je: " + $newNum);
            $el.text($newNum);
           }else{
            alert("Nema karata za predstavu!");
           }
           console.log(response);    
        });   

    };



    $('.btn1').on("click", function(){ 
        window.location.href = "../pages/tickets.php";     
    });

    
   
});