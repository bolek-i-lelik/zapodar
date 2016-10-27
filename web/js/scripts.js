function putInCorzina(id, user){
	$.ajax({
		url: '/basket/neworder',
		type: 'GET',
		data: {
			product_id: id,
			user_id: user,
		},
		success: function(res){
			window.location.reload();
		},
		error: function(){
			alert('Error');
		}
	});

}

function delFromBasket(id, user){
	$.ajax({
		url: '/basket/deleteoneproduct',
		type: 'GET',
		data: {
			id: id,
			user: user,
		},
		success: function(){
			console.log('Удалено');
			window.location.reload();
		},
		error: function(){
			console.log('Не удалено');
		}
	});

}

function minusP(count, id){
	$.ajax({
		url: '/basket/minus',
		type: 'GET',
		data: {
			id: id,
			count: count,
		},
		success: function(){
			console.log('Количество продуктов изменено');
			window.location.reload();
		},
		error: function(){
			console.log('Количество продуктов не изменено');
		}
	});

}

function plusP(count, id){
	$.ajax({
		url: '/basket/plus',
		type: 'GET',
		data: {
			id: id,
			count: count,
		},
		success: function(){
			console.log('Количество продуктов изменено');
			window.location.reload();
		},
		error: function(){
			console.log('Количество продуктов не изменено');
		}
	});

}

function deleteall(user_id){
	$.ajax({
		url: '/basket/deleteall',
		type: 'GET',
		data: {
			user_id: user_id,
			
		},
		success: function(){
			console.log('Корзина очищена');
			window.location.reload();
		},
		error: function(){
			console.log('Корзина не очищена');
		}
	});

}

function show_buy_text(obj) {
   	obj.innerHTML = "<b>Подробнее</b>";
   	obj.style = "background-color: #064727; color:#AACF9D;"
}

function show_buy_text_end(obj) {
	//var ss = document.getElementById(obj.id);
    //var nameNew = ss.name;
    obj.innerHTML = "<b>" + obj.name + "</b>";
    obj.style = "background-color: #FFFFFF;"
}

function f_zoom(srcPic) {
    img = document.getElementById("mainPic");
    img.src = srcPic;
}

function sendMessage(){
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var phone = document.getElementById('town').value;
	var text = document.getElementById('text').value;
	$.ajax({
		url: '/message',
		type: 'GET',
		data: {
			name: name,
			email: email,
			phone: phone,
			text: text,
		},
		success: function(res){
			console.log('Сообщение отправлено');
			elm = document.getElementById('resMessage');
			elm.innerHTML = res;
			adgj = document.getElementById('name');
			adgj.value = '';
			sfhk = document.getElementById('email');
			sfhk.value = '';
			xvnm = document.getElementById('town');
			xvnm.value = '';
			wqretyiu = document.getElementById('text');
			wqretyiu.value = '';
		},
		error: function(){
			console.log('Сообщение не отправлено');
		}
	});
}

function upUploadFoto(){
	$.ajax({
		url: '/admin/upuploadfoto',
		type: 'GET',
		data: {
			upoloadfoto: 1,
			
		},
		success: function(){
			console.log('Изменено');
			window.location.reload();
		},
		error: function(){
			console.log('Корзина не очищена');
		}
	});

}

function downUploadFoto(){
	$.ajax({
		url: '/admin/downuploadfoto',
		type: 'GET',
		data: {
			upoloadfoto: 0,
			
		},
		success: function(){
			console.log('Изменено');
			window.location.reload();
		},
		error: function(){
			console.log('Корзина не очищена');
		}
	});

}

function newzakaz(id){
	alert('Вы действительно хотите совершить заказ? Для продолжения нажмите "ОК"')
	$.ajax({
		url: '/basket/newzakaz',
		type: 'GET',
		data: {
			user_id: id,
			
		},
		success: function(res){
			alert('Заказ не может быть размещён по причине пустой корзины.');
			console.log('Заказ отправлен');
			window.location.reload();
		},
		error: function(){
			console.log('заказ не отправлен');
		}
	});

}