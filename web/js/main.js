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


$(window).load(function(){
    viewBasketBuyers();
});

$(document).ready(function(){
    // shop-cart view
    $('.panel-body-cart').on('click',function(e){
        e.preventDefault();
        var cartData = getCartData();
        var contentData = '<h4></h4>';
        var contentDataHeader ='<table class="table table-striped"><thead><tr><th>#</th><th>Код</th><th>Брэнд</th><th>Название</th><th>кол-во</th><th>Цена,шт.</th></tr></thead><tbody>';
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
            //var contentData = contentData + (cartData[items][0]+cartData[items][1]+cartData[items][2]+cartData[items][3]+cartData[items][4]+cartData[items][5])+'<br>';
            var contentData = contentData + '<tr><td>'+(numberPos = numberPos+1)+'</td><td>'+cartData[items][1]+'</td><td>'+cartData[items][3]+'</td><td>'+cartData[items][2]+'</td><td>'+cartData[items][5]+'</td><td><b>'+formPrice+ '</b></td></tr>' ;
        }
        var header = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div><h4>Просмотр корзины заказа</h4>  </div>';
        var footer = '<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Продолжить покупки</button> <button type="button" id="createOrderByer" class="btn btn-success btn-sm" >Оформить заказ</button> <button id="clearShopCart" type="button" class="btn btn-danger btn-sm">Очистить корзину</button>';
        var contentDataFooter = '</tbody></table> <h3> Итоговая сумма заказа <b> '+shopCartTotal+'</b> грн. </h3> <p class="small"> * Позиция <b>уточн.</b> требует уточнения цены у менеджера. Сумма заказа может быть изменена после уточнения. </p>';
        var contentDataBody = contentDataHeader+contentData+contentDataFooter;
        $('#largeModal .modal-header').empty();
        $('#largeModal .modal-header').append(header);
        $('#largeModal .modal-body').empty();
        $('#largeModal .modal-body').append(contentDataBody);
        $('#largeModal .modal-footer').empty();
        $('#largeModal .modal-footer').append(footer);
        $('#largeModal').modal('show');
        

    })
    // create order byer
    $('#largeModal').on('click','#createOrderByer',function(e){
        e.preventDefault();
        var content = '<p> Поздравляем! Вы только что совершили заказ в инетернет магазине. Менеджер свяжется с вами в ближайшее время. Копия заказа отпралена на ваш почтовый ящик. Контакты интернет магазина </p>';
        //$('#largeModal').modal('hide');
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
                //$('#largeModal').modal('hide');

            }
        });
    })
    // shop buyer
    $('#largeModal').on('click','#successBuy',function(e) {
        e.preventDefault();
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
                //$('#largeModal .modal-header').append(header);

                $('#largeModal .modal-body').empty();
                $('#largeModal .modal-body').append(data);

                $('#largeModal .modal-footer').empty();
                // $('#largeModal .modal-footer').append(footer);
                $('#largeModal').modal('hide');

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
    $('#contentBody').on('click','.pay-button',function(e){
        e.preventDefault();
        var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
            source = $(this).data('source'),
            artid = $(this).data('artid'),
            partname = $(this).data('partname'),
            brand = $(this).data('brand'),
            price = $(this).data('price'),
            qty = 1;
            if(cartData.hasOwnProperty(artid)){ // если такой товар уже в корзине, то добавляем +1 к его количеству
                cartData[artid][5] += 1;
                console.log(cartData[artid][3]);
                console.log(cartData[brand]);
                //console.log(cartData[artid][5]);
               // cartData.qty = cartData.qty+1;
               // cartData[artid] = [source,artid, partname, brand, price, qty];

            } else { // если товара в корзине еще нет, то добавляем в объект
                cartData[artid] = [source,artid, partname, brand, price, qty];
            }
            // cartData[artid] = [source,artid, partname, brand, price, qty];
        setCartData(cartData); // Обновляем данные в LocalStorage
        viewBasketBuyers();
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
        error_message = "Error Article request, please contact admin";
        var inputSearchArt = $("#inputSearchArt").val().replace(/\s+/g, '');
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
    })
    $("#searchOem").on('click',function () {
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
    })


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

