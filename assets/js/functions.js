$('form.form-ajax').on('submit', function(e){
	e.preventDefault();
	
	var form = $(this);

	form.ajaxSubmit({
		type: 'POST',
		dataType: 'json',
		success: function(json) {
			if (json.status != '0') {
				if (json.removerDaLista) {
					form.parent().parent().remove();
				}
				if (json.redirecionar) {
					window.location = $('base').attr('href') + json.redirecionar;
				}
			}else{
				alert(json.msg);
			}
		}
	});
	return false;
});