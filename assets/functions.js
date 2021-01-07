$('form.form-ajax').on('submit', function(e){
	e.preventDefault();
	
	var form = $(this);

	form.ajaxSubmit({
		type: 'POST',
		dataType: 'json',
		beforeSend : function() {

		},
		error: function() {

		},
		sucess: function() {

		},
		complete: function(){

		}
	});
	return false;
});