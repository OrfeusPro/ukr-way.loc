$("#mainform_action").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitMainForm();
});

$("#modalform_action").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitModalForm();
});

function submitMainForm(){
    var name_user = $("#name").val(); //Имя
    var tel_user = $("#phone").val(); //телефон 
    var otkuda = $("#otkuda").val(); //телефон 
    var kuda = $("#kuda").val(); //телефон 
    var nowdate = $("#nowdate").val(); //телефон 
    var modal_email = ''; // 

    submitForm(name_user, tel_user, modal_email, otkuda, kuda, nowdate);
}

function submitModalForm(){
    var name_user = $("#modal_name").val(); //Имя
    var tel_user = $("#modal_phone").val(); //телефон 
    var otkuda = ''; //телефон 
    var kuda = ''; //телефон 
    var nowdate = ''; //телефон 
    var modal_email = ''; // 

    submitForm(name_user, tel_user, modal_email, otkuda, kuda, nowdate);
}

function submitForm(name_user, tel_user, modal_email, otkuda, kuda, nowdate){
   /* // Initiate Variables With Form Content
    var name_user = $("#modalname_user").val(); //Имя
    var tel_user = $("#modaltel_user").val(); //телефон*/

    //alert("name_user: "+(name_user)+' // tel_user: '+(tel_user));

    $.ajax({
        type: "POST",
        url: "/form-process",
        data: "name_user=" + name_user + "&tel_user=" + tel_user + "&email=" + modal_email + "&otkuda=" + otkuda + "&kuda=" + kuda + "&nowdate=" + nowdate,
        success : function(text){
            if (text == "success"){
                formSuccess();
                   	
            }
            else
            {
            	formSuccess();
            	   	
            }
        }
    });
}
function formSuccess(){
    window.location.replace("./thanks");
}


// jQuery('input[name="tel"]').mask("+38 (099) 999-99-99",{placeholder:"_"});
jQuery(function() {
	//Функция проверяет заполнено ли поле с телефоном
	function formValide() {			
		var str_callback = jQuery('#zakaz-form input[name=tel]').val();
		str_callback = jQuery.trim(str_callback);                
		if(str_callback.length < 5){                
			jQuery('#zakaz-form input[name=tel]').addClass('uk-form-danger');
			jQuery('#zakaz-form').before('<h4 id="callback_text">Заполните все обязательные поля (выделены красным)</h4>');		
			return false;
		}	
		return true;
	}

	//при нажатии на кнопку button нужной формы запускаем функцию обработки данных
	jQuery('#zakaz-form .uk-button-default').on('click', function() {
		if (formValide()) {
			//если форма прошла проверку, выводим блок с текстом ожидания
			jQuery('#zakaz-form').before('<h4 id="callback_text">Оформление заявки. Подождите...</h3>');
			
			//берем путь php обработчика
			order_url_callback = 'order.php'			
			//посылаем асинхронный запрос на сервер и передаем все данные формы
			jQuery.post(order_url_callback,{
                    kuda: jQuery('#zakaz-form input[name=where]').val(),
                    datetime: jQuery('#zakaz-form input[name=datetime]').val(),
					name: jQuery('#zakaz-form input[name=name]').val(),
					tel: jQuery('#zakaz-form input[name=tel]').val(),
					send: "1"
				}, function(data) {
					//выводим возврашаемый сервером код html вместо содержимого формы
				jQuery('#callback_text').html(data);
				jQuery('#callback_text').show();
				jQuery('#callback_text_2').remove();
			}, "html"); 
		} 
		return false;
		
		
	});
});
