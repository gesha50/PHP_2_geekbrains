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
    $('.increment').on('click', function(){

        let id_good = $(this).attr("data-id");
        $.ajax({
            url: "index.php?path=Cart/increment/",
            type: "GET",
            data:{
                params: id_good
            },
            dataType : "json",
            // error: function() {
            //     alert("Что-то пошло не так...");
            // },
            success: function(answer){
                $('#value__counter_'+id_good).text(answer['content_data'][0].counter)
            }
        })
    });
    $('.decrement').on('click', function(){
        let id_good = $(this).attr("data-id");
        let counter = $('#value__counter_'+id_good).text()
        $.ajax({
            url: "index.php?path=Cart/decrement/",
            type: "GET",
            data:{
                params: id_good,
                count: counter
            },
            dataType : "json",
            // error: function() {
            //     alert("Что-то пошло не так...");
            // },
            success: function(answer){
                $('#value__counter_'+id_good).text(answer['content_data'][0].counter)
                //renderCart();
            }
        })
    });
    function renderCart() {
        $.ajax({
            url: "index.php?path=Cart",
            type: "GET",
            //dataType: "json",
            error: function() {
                alert("Что-то пошло не так...");
            },
            success: function(answer){
                console.log('ok')
            }
        })
    }

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






