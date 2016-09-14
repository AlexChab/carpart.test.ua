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
        for(var items in cartData){
            console.log(cartData[items][0]+cartData[items][1]+cartData[items][2]+cartData[items][3]+cartData[items][4]+cartData[items][5]);
        }
        console.log('test');
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

