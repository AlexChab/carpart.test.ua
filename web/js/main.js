// Чтение из LocalStorage

function getCartData(){
    return JSON.parse(localStorage.getItem('cart'));
}
// Записываем данные в LocalStorage
function setCartData(data){
    localStorage.setItem('cart', JSON.stringify(data));
    return false;
}
// Сброс LocalStorage 
function clearCartData(){
    localStorage.removeItem('cart');
    viewBasketBuyers();
}
// Просомтр данных в Локал сторадже для вывода корзины
function viewBasketBuyers(){
    var dataPrice = 0;
    var dataCountPos = 0;
    var cartData = getCartData()|| {},
        source ='NoSource',
        artid =0,
        partname= 'Noname',
        brand = 'Noname',
        price ='уточн.',
        qty = 0;
    for(var items in cartData){
        if(cartData[items][4] != 'уточн.' ){
            var dataPrice = dataPrice+(cartData[items][4]*cartData[items][5]);
        }
        dataCountPos = dataCountPos+cartData[items][5];
    }
    var data = '<a href="#" class="panel-shopcart"> </a><p> Позиций : <b> '+dataCountPos+' </b> на сумму: <b>'+ dataPrice +' грн.</b></p>';
    $('.panel-body-cart').empty();
    $('.panel-body-cart').html(data);
}

// delete cart position
function delRowCartData(artid){
    var footer = '</tbody></table> <p class="small"> * Позиция <b>уточн.</b> требует уточнения цены у менеджера. Сумма заказа может быть изменена после уточнения. </p>';
    var cartData = getCartData();
    delete cartData[artid];
    setCartData(cartData);
    viewBasketBuyers();
    var contentDataBody = shopCartView();
    $('#largeModal .modal-body').empty();
    $('#largeModal .modal-body').append(contentDataBody);

}

// shop cart view
function shopCartView(){
    var cartData = getCartData();
    var contentData = '<h4></h4>';
    var contentDataHeader ='<table class="table table-striped"><thead><tr><th>#</th><th>Код</th><th>Брэнд</th><th>Название</th><th>кол-во</th><th>Цена,шт.</th><th></th></tr></thead><tbody>';
    var numberPos = 0;
    var shopCartTotal = 0;
    for(var items in cartData){
        if (cartData[items][4] == 'уточн.'){
            var formPrice = 'уточн.';
        }
        else{
            var formPrice = '<b>'+cartData[items][4]+'</b> грн.';
            var shopCartTotal = shopCartTotal+(cartData[items][4]*cartData[items][5]);
        }
        var contentData = contentData + '<tr><td>'+(numberPos = numberPos+1)+'</td><td>'+cartData[items][1]+'</td><td>'+cartData[items][3]+'</td><td>'+cartData[items][2]+'</td><td>'+cartData[items][5]+'</td><td><b>'+formPrice+ '</b></td><td class="text-danger rowDel" data-artid="'+cartData[items][1]+'"><i class="fa fa-trash del-row-button" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Удалить позицию"></i></td></tr>' ;
    }
    var contentDataFooter = '</tbody></table> <h3> Итоговая сумма заказа <b> '+shopCartTotal+'</b> грн. </h3> <p class="small"> * Позиция <b>уточн.</b> требует уточнения цены у менеджера. Сумма заказа может быть изменена после уточнения. </p>';
    var contentDataBody = contentDataHeader+contentData+contentDataFooter;
    return contentDataBody;
};

$(window).load(function(){
    viewBasketBuyers();
});

$(document).ready(function(){
    // shop-cart view
    $('.panel-body-cart').on('click',function(e){
        e.preventDefault();
        var header = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div><h4>Просмотр корзины заказа</h4>  </div>';
        var footer = '<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Продолжить покупки</button> <button type="button" id="createOrderByer" class="btn btn-success btn-sm" >Оформить заказ</button> <button id="clearShopCart" type="button" class="btn btn-danger btn-sm">Очистить корзину</button>';
        var contentDataBody = shopCartView();
        $('#largeModal .modal-header').empty();
        $('#largeModal .modal-header').append(header);
        $('#largeModal .modal-body').empty();
        $('#largeModal .modal-body').append(contentDataBody);
        $('#largeModal .modal-footer').empty();
        $('#largeModal .modal-footer').append(footer);
        $('#largeModal').modal('show');
    })
    // delete row from shop cart
    $('#largeModal').on('click','.rowDel',function(){
        delRowCartData($(this).attr("data-artid"));
        $(this).closest('tr').remove();
    })
    // create order byer
    $('#largeModal').on('click','#createOrderByer',function(e){
        e.preventDefault();

        var cartData = getCartData();
        var header = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div><h4> Оформление заказа</h4>  </div>';
        var footer = '<button type="button" id="successBuy" class="btn btn-warning btn-sm" >Оформить заказ</button> ';
        $.ajax({
            url:'/cart/createorder',
            type:'POST',
            data:'jsonData='+JSON.stringify(cartData),
            success: function(data) {
                $('#largeModal .modal-header').empty();
                $('#largeModal .modal-header').append(header);
                $('#largeModal .modal-body').empty();
                $('#largeModal .modal-body').append(data);
                $('#largeModal .modal-footer').empty();
                $('#largeModal .modal-footer').append(footer);

            }
        });
    })
    // shop buyer
    $('#largeModal').on('click','#successBuy',function(e) {

        e.preventDefault();
        var header = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div><h4>Завершение покупки</h4>  </div>';
        var content = '<p> Поздравляем! Вы только что совершили заказ в инетернет магазине. Менеджер свяжется с вами в ближайшее время. Копия заказа отпралена на ваш почтовый ящик. Контакты интернет магазина </p>';
        var footer = '<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"> Закрыть </button> ';
        //$('#largeModal').modal('hide');
        var cartData = getCartData();
        var formNameBuyer = $('#inputNameBuyer').val();
        var formEmailBuyer = $('#inputEmailBuyer').val();
        var formPhoneBuyer = $('#inputPhoneBuyer').val();
        var data = 'jsonData='+JSON.stringify(cartData)+'&formNameBuyer='+formNameBuyer+'&formEmailBuyer='+formEmailBuyer+'&formPhoneBuyer='+formPhoneBuyer;
        console.log(data);
        $.ajax({
            url:'/cart/successbuy',
            type:'POST',
            data: data,
            success: function(data) {
                $('#largeModal .modal-header').empty();
                $('#largeModal .modal-header').append(header);
                $('#largeModal .modal-body').empty();
                $('#largeModal .modal-body').append(content);
                $('#largeModal .modal-footer').empty();
                $('#largeModal .modal-footer').append(footer);
                clearCartData();
                $('#largeModal').modal('show');

            }
        });
    })
    // clear shop cart modal window
    $('#largeModal').on('click','#clearShopCart',function(e){
        e.preventDefault();
        $('#largeModal').modal('hide');
        clearCartData();
        var header = ' <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div>Сообщение</div>';
        var content = '<h4 class="center"> Ваша корзина пуста </h4>';
        var footer = '<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Продолжить покупки</button>';
        $('#smallModal .modal-header').empty();
        $('#smallModal .modal-header').append(header);
        $('#smallModal .modal-body').empty();
        $('#smallModal .modal-body').append(content);
        $('#smallModal .modal-footer').empty();
        $('#smallModal .modal-footer').append(footer);
        $('#smallModal').modal('show');
    })

     // pay-button click
    function addBasket(){
        console.log($('#formAddBascetSource').val());
        console.log( $('#formAddBasketQty').val());
        var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
            source = $('#formAddBascetSource').val(),
            artid = $('#formAddBascetArtid').val(),
            partname = $('#formAddBascetPartname').val(),
            brand = $('#formAddBascetBrand').val(),
            price = $('#formAddBascetPrice').val(),
            qty = Number($('#formAddBasketQty').val());
        if(qty==0){
            qty = Number(1);
        }
        if(cartData.hasOwnProperty(artid)){ // если такой товар уже в корзине, то добавляем  к его количеству
            cartData[artid][5] += qty;
        } else { // если товара в корзине еще нет, то добавляем в объект
            cartData[artid] = [source,artid, partname, brand, price, qty];
        }
        setCartData(cartData); // Обновляем данные в LocalStorage
        viewBasketBuyers();

    }

    $('#largeModal').on('click','#buttonAddBasket',function(e){
        // console.log('AddButton');
        e.preventDefault();
        addBasket();
    })
    $('#largeModal').on('focus','#formAddBasketQty',function(){
       $(this).attr('value','');

    })
    $('#contentBody').on('click','.pay-button',function(e){
        e.preventDefault();
        var contentDataBody =
            '<form id="formAddBasket" class="form-inline" role="form">'+
             ' <table class="table table-hover"><tr><th>Артикул</th><th>Производитель</th><th>Название</th><th>Цена,ед. грн.</th></tr>'+
             '<tr>'+
            '<td><div class="form-group"> <input type="text" id="formAddBascetArtid" name="formAddBascetArtid" class="form-control" value="'+$(this).data('artid') +'" placeholder="'+$(this).data('artid') +'" readonly></div></td>'+
            '<td><div class="form-group"> <input type="text" id="formAddBascetBrand" name="formAddBascetBrand" class="form-control"  value="'+$(this).data('brand') +'" placeholder="'+$(this).data('brand') +'" readonly></div></td>'+
            '<td><div class="form-group"> <input type="text" id="formAddBascetPartname" name="formAddBascetPartname" class="form-control" value="'+$(this).data('partname') +'" placeholder="'+$(this).data('partname') +'" readonly></div></td>'+
            '<td><div class="form-group"> <input type="text" id="formAddBascetPrice" name="formAddBascetPrice" class="form-control" value="'+$(this).data('price') +'" placeholder="'+$(this).data('price') +'" readonly></div></td>'+
            '<td><div class="form-group"> <input type="hidden" id="formAddBascetSource" name="formAddBascetSource" class="form-control" value="'+$(this).data('source') +'"></div></td>'+
            '<tr><td></td><td></td><td><b>Укажите количество</b></td>'+
            '<td><div class="form-group"><input type="text" id="formAddBasketQty" name="formAddBasketQty" class="form-control" value="1" ></div></td>'+
            '</tr></table></form>';
        var header = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div><h4>Поместить товар в корзину</h4>  </div>';
        var footer = '<button id="buttonAddBasket" type="button" class="btn btn-success btn-sm" data-dismiss="modal">В корзину</button> <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Отмена</button>';
        $('#largeModal .modal-header').empty();
        $('#largeModal .modal-header').append(header);
        $('#largeModal .modal-body').empty();
        $('#largeModal .modal-body').append(contentDataBody);
        $('#largeModal .modal-footer').empty();
        $('#largeModal .modal-footer').append(footer);
        $('#largeModal').modal('show');
    });

    $('#collapseOne').on('hidden.bs.collapse', function () {
        $("#my-garage").removeClass("fa-chevron-up");
	    $("#my-garage").addClass("fa-chevron-down");
	});
	$('#collapseOne').on('shown.bs.collapse', function () {
		$("#my-garage").removeClass("fa-chevron-down");
	    $("#my-garage").addClass("fa-chevron-up");
	});

	// delete my-car garage
	$('.del-my-car').on('click',function(){
		var header = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div>Предупреждение</div>';
		var footer = '<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Отмена</button><button type="button" class="btn btn-danger btn-sm">Удалить</button>';
		$('#smallModal .modal-header').empty();
		$('#smallModal .modal-header').append(header);
		$('#smallModal .modal-body').empty();
		$('#smallModal .modal-body').append('Удалить элемент '+$('#'+this.id).attr('data-car-info') + ' ?' );
		$('#smallModal .modal-footer').empty();
		$('#smallModal .modal-footer').append(footer);
		$('#smallModal').modal('toggle');

		$('#form-'+this.id).remove();
	})
	// call back phone
	$('#call-back').on('click',function(){
		var header = ' <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div>Обратный вызов</div>';
		var content = '<div class="form-group"><label for="cbInputName">Ваше имя</label><input type="email" class="form-control" id="cbInputName" placeholder="Ваше имя"></div><div class="form-group"><label for="cbInputPhone">Ваш телефон</label><input type="password" class="form-control" id="cbInputPhone" placeholder="Телефон"></div>';
		var footer = ' <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Отмена</button><button type="button" class="btn btn-success btn-sm">Вызов</button>';
		$('#smallModal .modal-header').empty();
		$('#smallModal .modal-header').append(header);
		$('#smallModal .modal-body').empty();
		$('#smallModal .modal-body').append(content);
		$('#smallModal .modal-footer').empty();
		$('#smallModal .modal-footer').append(footer);
		$('#smallModal').modal('toggle');
	})


	// search panel on header
    $("#searchArt").on('click',function () {
        searchArt();
    })
    $("#inputSearchArt").keypress(function(e){
       if(e.keyCode==13){

            searchArt();
       }
    });
    function searchArt(){
        error_message = "Error Article request, please contact admin";
        var inputSearchArt = $("#inputSearchArt").val().replace(/[^a-zA-Z0-9]/g,'');
        $.ajax({
            type: 'GET',
            url: '/home/searchart?article='+inputSearchArt,
            success: function(data)
            {
                $("#contentBody").empty();
                $("#contentBody").append(data);

            },
            error: function()
            {
                alert(error_message);
            }

        });
    }

    $("#searchOem").on('click',function () {
        searchOEM();
    })
    $("#inputSearchOem").keypress(function(e){
        if(e.keyCode==13){
            searchOEM();
        }
    });

    function searchOEM () {
        error_message = "Error ajax Oem request,please contact admin";
        var inputSearchOem = $("#inputSearchOem").val().replace(/\s+/g, '');
        $.ajax({
            type: 'GET',
            url: '/oem/getoem?oem='+inputSearchOem,
            success: function(data)
            {
                $("#contentBody").empty();
                $("#contentBody").html(data);

            },
            error: function()
            {
                alert(error_message);
            }
        });
    }


    // -- Hover на изменение вида 
	$('.category').hover(function(){
		console.log();
		// this.('i').addClass('fa-spin');
	},
	function(){
		console.log('by');
	})
     $('#dataTables-example').DataTable({
       responsive: true
    });

});

