
function showMore (id)
{
    let nextId = id+2;
    console.log('ok');
    console.log(id);
    let str = "id=" + id;
    $.ajax(
        {
            type: "GET",
            url: "model/ShowMore.php",
            data: str,
            contentType: 'application/json',
            dataType: "json",
            error: function (req, text, error) { // отслеживание ошибок во время выполнения ajax-запроса
                alert('Хьюстон, У нас проблемы! ' + text + ' | ' + error);
            },
            success: function (answer) {
                let elem = document.querySelector('.goodsItem')
                let elemButton = document.querySelector('button')
                for (let key in answer){
                    let item = '<div>';
                    item += '<h4>' + answer[key][1] + '</h4>';
                    item += '<a href="img/' + answer[key][3] + '"><img style=\'width: 300px;\' src="img/' + answer[key][3] + '" alt=""></a>';
                    item += '<p>' + answer[key][2] + '</p>'
                    item += '<p>' + answer[key][4] + 'р</p>'
                    elem.innerHTML += item;
                    // idBtn = answer[key][0];
                    // console.log(idBtn)
                }
                elemButton.removeAttribute('onclick');
                elemButton.setAttribute('onclick', 'showMore('+nextId+')');
            }
        }
    )
}
