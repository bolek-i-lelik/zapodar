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