$(document).ready(function(){
    $('.buy').click (function(){
        let id_good = $(this).attr("data-id");
        console.log(id_good)
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
            console.log(answer)
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
            let elem = document.querySelector('.cart__itemContainer')
            if (answer['content_data'][0].length) {
                for (key in answer['content_data'][0]) {
                    item = '<div class="cart__item">'
                    item += '<div class="itemInCart">'
                    item += '<div class="itemInCart__block">'
                    item += '<img class="itemInCart__img" src="' + answer['content_data'][0][key].img + '" alt="#" class="itemInCart__img"></div>'
                    item += '<div class="itemInCart__block">'
                    item += '<a class="itemInCart__link" href="index.php?path=catalog/oneGood/' + answer['content_data'][0][key].id_catalog + '">'
                    item += '<h3>' + answer['content_data'][0][key].title + '</h3></a></div>'
                    item += '<div class="itemInCart__block"><p>' + answer['content_data'][0][key].price + ' руб</p></div>'
                    item += '<div class="itemInCart__block itemInCart__counter">'
                    item += '<span onclick="decrement(' + answer['content_data'][0][key].id_catalog + ')" id="dec_{{ item.id_catalog }}" class="itemInCart__btn decrement"><i class="fas fa-minus"></i></span>'
                    item += '<span class="itemInCart__number" id="value__counter_' + answer['content_data'][0][key].id_catalog + '">' + answer['content_data'][0][key].counter + '</span>'
                    item += '<span onclick="increment(' + answer['content_data'][0][key].id_catalog + ')" id="inc_{{ item.id_catalog }}" class="itemInCart__btn increment"><i class="fas fa-plus"></i></span>'
                    item += '</div>'
                    item += '<div class="itemInCart__block"><p>Всего: ' + answer['content_data'][0][key].price * answer['content_data'][0][key].counter + ' руб</p></div>'
                    item += '</div></div>'
                    if (key == 0) {
                        elem.innerHTML = '';
                    }
                    elem.innerHTML += item
                }
                $('.cart__total').html('<p class="cart__totalPrice" >Итоговая стоимость: <strong>' + answer['content_data'][1][0].total + '</strong> руб</p>')
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

function aboutOrder(id) {
    $.ajax(
        {
            type: "GET",
            url: "index.php?path=admin/popup/"+id,
            //data: id
            dataType: "json",
            success: function (answer) {
                console.log(answer);
                console.log(answer['content_data'][0].title);

                let modal = document.querySelector('.popup__text');
                let totalPrice = 0;
                let itemAllPrice = 0;
                let item = '<table><tr><th>Имя товара:</th><th>стоимость:</th><th>кол-во:</th><th>всего:</th></tr>';
                for (let key in answer['content_data']) {
                    totalPrice = answer['content_data'][key].price * answer['content_data'][key].counter;
                    itemAllPrice += answer['content_data'][key].price * answer['content_data'][key].counter;
                    item += '<tr><td>' + answer['content_data'][key].title + '</td>';
                    item += '<td>' + answer['content_data'][key].price + '</td>';
                    item += '<td>' + answer['content_data'][key].counter + '</td>';
                    item += '<td>' + totalPrice + '</td></tr>';

                    if(key == 0){
                        modal.innerHTML = '';
                    }
                }
                item += '</table>';
                item += '<p>Общая стоимость заказа: ' + itemAllPrice + '</p>';

                modal.innerHTML += item;
            }
        }
    )
}






