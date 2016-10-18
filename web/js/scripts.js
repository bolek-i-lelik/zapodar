function putInCorzina(id, user){
	$.ajax({
		url: '/basket/neworder',
		type: 'GET',
		data: {
			product_id: id,
			user_id: user,
		},
		success: function(res){
			result = JSON.parse(res);
			var infoHTML1 = result.text;
        	$('#basket').html(infoHTML1);
        	var infoHtml2 = 'В корзине '+result.countbasket+' товар';
        	$('#korzina').html(infoHtml2);
		},
		error: function(){
			alert('Error');
		}
	});

}