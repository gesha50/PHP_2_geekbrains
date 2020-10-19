$(document).ready(function(){
    $('.btnBuy').on('click', function(){
        let id_good = $(this).attr("data-id");

        $.ajax({
            url: "index.php?path=Catalog/add/",  // /index.php?path=Cart  /Cart/add/
            type: "GET",
            data:{
                params: id_good
            },
            //dataType : "json",
            // error: function() {
            //     alert("Что-то пошло не так...");
            // },
            success: function(answer){
                ajaxQuantity();
            }
        })
    });
});

function ajaxQuantity() {
    $.ajax({
        url: "index.php?path=Catalog/quantity/",
        type: "POST",
        dataType: "json",
        error: function() {
            alert("Что-то пошло не так...");
        },
        success: function(answer){
            $('#cart__counter').text(answer['cartQuantity']);
        }
    })
}
