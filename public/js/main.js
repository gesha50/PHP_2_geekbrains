$(document).ready(function(){
    $('.btnBuy').click (function(){
        let id_good = $(this).attr("data-id");

        $.ajax({
            url: "index.php?path=Catalog/add/",
            type: "GET",
            data:{
                params: id_good
            },
            //dataType : "json",
            error: function() {
                alert("Что-то пошло не так...");
            },
            success: function(answer){
                ajaxQuantity()
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
function renderCart() {
    $.ajax({
        url: "index.php?path=Cart",
        type: "GET",
        data:{
            isAjax: true
        },
        dataType: "json",
        error: function() {
            alert("Что-то пошло не так...");
        },
        success: function(answer){
            let elem = document.querySelector('.cartCatalog')
            if (answer['content_data'][0].length) {
                for (key in answer['content_data'][0]) {
                    item = '<div class="cartItem">'
                    item += '<a href="index.php?path=catalog/oneGood/' + answer['content_data'][0][key].id_catalog + '">'
                    item += ' <h3>' + answer['content_data'][0][key].title + '</h3></a>'
                    item += '<p>Цена: ' + answer['content_data'][0][key].price + '</p>'
                    item += '<div><div class="count__div">Кол-во: </div>'
                    item += '<span onclick="decrement(' + answer['content_data'][0][key].id_catalog + ')" id="dec_' + answer['content_data'][0][key].id_catalog + '" data-id="' + answer['content_data'][0][key].id_catalog + '" class="btn decrement">-</span>'
                    item += '<span id="value__counter_' + answer['content_data'][0][key].id_catalog + '">' + answer['content_data'][0][key].counter + '</span>'
                    item += '<span onclick="increment(' + answer['content_data'][0][key].id_catalog + ')" id="inc_' + answer['content_data'][0][key].id_catalog + '" data-id="' + answer['content_data'][0][key].id_catalog + '" class="btn increment">+</span></div>'
                    item += '<p>Всего: ' + answer['content_data'][0][key].price * answer['content_data'][0][key].counter + '</p></div>'
                    if (key == 0) {
                        elem.innerHTML = '';
                    }
                    elem.innerHTML += item
                }
                elem.innerHTML += '<div class="totalDiv"><p class="totalPrice" >Итоговая стоимость: ' + answer['content_data'][1][0].total + ' руб</p></div>'
            } else {
                elem.innerHTML = "Корзина пуста =("
            }
        }
    })
}

function decrement(id){
    let counter = $('#value__counter_'+id).text()
    $.ajax({
        url: "index.php?path=Cart/decrement/",
        type: "GET",
        data:{
            params: id,
            count: counter
        },
        dataType : "json",
        error: function() {
            alert("Что-то пошло не так...");
        },
        success: function(answer){
            if (counter == 1){
                renderCart();
            } else {
                $('#value__counter_'+id).text(answer['content_data'][0].counter)
                renderCart();  // нужно перерендерить только цифорки
            }
        }
    })
}

function increment(id){
    $.ajax({
        url: "index.php?path=Cart/increment/",
        type: "GET",
        data:{
            params: id
        },
        dataType : "json",
        error: function() {
            alert("Что-то пошло не так...");
        },
        success: function(answer){
            $('#value__counter_'+id).text(answer['content_data'][0].counter)
            renderCart()
        }
    })
}






