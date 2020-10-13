$(document).ready(function(){
   $('.btnBuy').on('click', function(){
       let id_good = $(this).attr("data-id");
       let className = 'Cart';
       let actionName = 'index';

       $.ajax({
           url: "../model/providerClasses.php", // providerClasses
           type: "POST",
           data:{
               params: id_good,
               class: className,
               action: actionName
           },
           //dataType : "json",
           // error: function() {
           //     alert("Что-то пошло не так...");
           // },
           success: function(answer){

               //getCounter(id_good);
               //console.log(answer)
               $('#cart__counter').text(answer);
           }
       })
   });
});

function getCounter(id) {
    let className = 'Cart';
    let actionName = 'getCounter';
    $.ajax({
        url: "../model/providerClasses.php", // providerClasses
        type: "POST",
        data:{
            params: id,
            class: className,
            action: actionName
        },
        //dataType: "json",
        error: function() {
            alert("Что-то пошло не так...");
        },
        success: function(answer){
            console.log(answer[0])
            $('#cart__counter').text(answer);
        }
    })
}
