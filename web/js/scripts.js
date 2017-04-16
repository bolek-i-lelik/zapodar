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

function getChildCategory(id){
	$.ajax({
		url: '/categorys/childs',
		type: 'POST',
		data: {
			parent_id: id,
		},
		success: function(res){
			res = JSON.parse(res);
			if(res.length > 0){
				var div = document.getElementById('cat' + id);
				var html = '';
				res.forEach(function(item){
					html += '<p>';
					html += '<a href="#" onclick="getChildCategory(' + item.id + ')">|_ <b>' + item.name + '</b></a> ';
					html += ' <a href="/categorys/update?id=' + item.id +'" style="text-decoration: none; color: blue;"><u>редактировать</u></a>';
					html += ' <a href="#" data-toggle="modal" data-target="#myModal" onclick="changeParent(' + item.id + ')" style="text-decoration: none; color: orange;"><u>переместить</u></a>';
					html += '</p>';
					html += '<div class="childCats" id="cat' + item.id + '"></div>'
				});
				div.innerHTML = html;
			}else{
				alert('Дочерние категории отстствуют');
			}
		},
		error: function(){
			console.log('внутренняя ошибка сервера');
		}
	});
}

function changeParent(id){
	console.log('Ghbdtn');
	$.ajax({
		url: '/categorys/all',
		type: 'POST',
		data: {
			
		},
		success: function(res){
			res = JSON.parse(res);
			console.log(res);
			var modal = document.getElementById('modal-body');
			var html = '<p><a href="#" onclick="setNewParent(' + id + ',0)"> Каталог </a></p>';
			res.forEach(function(item, i){
				html += '<p><a href="#" onclick="setNewParent(' + id + ',' + item.id + ')">' + item.name + '</a></p>';
			});
			modal.innerHTML = html;
		},
		error: function(){
			console.log('внутренняя ошибка сервера');
		}
	});
}

function setNewParent(id, parent_id){
	$.ajax({
		url: '/categorys/newparent',
		type: 'POST',
		data: {
			id: id,
			parent_id: parent_id,
		},
		success: function(){
			window.location.href = '/categorys/structure';
		},
		error: function(){
			console.log('заказ не отправлен');
		}
	});
}

function openFolder(dir, file){
	$.ajax({
		url: '/media/opendir',
		type: 'POST',
		data: {
			dir: dir,
			dir_new: file,
		},
		success: function(data){
			console.log(data);
			data = JSON.parse(data);
			var dirs = document.getElementById('files');
			var directs = data.files;
			var count = 0;
			var html = '';
			directs.forEach(function(item){
					html += '<div class="col-lg-2"><center><div style="height:200px;"><img src="'+data.dir_foto+'/'+item+'" width="100px"><p>'+item+'</p></div></center></div>';
				
			});
			dirs.innerHTML = html;

			var div = document.getElementById('files-header');
			div.innerHTML = 'Файлы - директория: '+file;
			document.getElementById('uploadDir').value = '/web/img/'+file;
			//window.location.href = '/categorys/structure';
		},
		error: function(){
			console.log('заказ не отправлен');
		}
	});
}

function addNewDirectory(){
	var name = document.getElementById('newDerectory').value;
	$.ajax({
		url: '/media/addnewdir',
		type: 'POST',
		data: {
			name: name,			
		},
		success: function(data){
			//console.log(data);
			
			window.location.href = '/media';
		},
		error: function(){
			console.log('заказ не отправлен');
		}
	});
}

//действия при выборе файла в файловой системе компа
if(document.getElementById('#uploadFile')){
    document.querySelector('#uploadFile').addEventListener('change', function(e){
        var file = e.target.files[0];
        //Проверяем размер - не больше 2 Мб (для передачи по веб-сокету)
        if(file.size <= 2048000){
            if (file) {
                var fileName = file['name'];
                var reader = new FileReader();
                var fileUpload;
                reader.readAsDataURL(file);
                //console.log(file);
                reader.onload = function (f){
                    var dataUri = f.target.result;
                    fileUpload = f.target.result;
                    var mime = fileName.split(".");
                    //console.log(mime);
                    //Проверка расширения файла - допущены только статичные изображения, сканированные документы и офисные документы
                    if(mime[1] == 'jpg' || mime[1] == 'jpeg' || mime[1] == 'png' || mime[1] == 'xls' || mime[1] == 'xlsx' || mime[1] == 'doc' || mime[1] == 'docx' || mime[1] == 'odt' || mime[1] == 'ods' || mime[1] == 'pdf' || mime[1] == 'rar' || mime[1] == 'zip'){
                        //Отправка файла на сервер
                        var dir = document.getElementById('uploadDir').value;
                        $.ajax({
					        url: '/media/upload',
					        type: 'POST',
					        data: {
					        	'dir': dir,
					        	'fileName': fileName,
					        	'file': fileUpload, 
					        },
					        success: function(data){
					        	//переадрессация
					            window.location.href = "/media";
					            //console.log(data);
					        },
					        error: function(){
					            console.log('Внутренняя ошибка сервера');
					        }
					    });
                        
                    }else{
                        //Вывод ошибки расширения
                        $('#default-modal .modal-title').text('Загрузка файлов');
                        $('.modal-dialog').removeClass('modal-md modal-lg modal-xs modal-lg');
                        $('.modal-dialog').addClass('modal-sm');
            
                        var div = document.getElementById('modal-content');

                        var html = 'Файл с таким расширением не может быть загружен!';
                        
                        div.innerHTML = html;
                        $('#default-modal').modal('show');

                    }
                };
            }
        }else{
            //Вывод ошибки размера файла
            $('#default-modal .modal-title').text('Загрузка файлов');
            $('.modal-dialog').removeClass('modal-md modal-lg modal-xs modal-lg');
            $('.modal-dialog').addClass('modal-sm');
            
            var div = document.getElementById('modal-content');

            var html = 'Размер, выбранного файла превышает 2 Мб и не может быть загружен!';
                        
            div.innerHTML = html;
            $('#default-modal').modal('show');
        }
    });
}