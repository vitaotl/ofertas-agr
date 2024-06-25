$('form#form-oferta').submit(function()
{
	let form = $(this);

	let site = $('select[name=site]').val()

	if(!site.length)
	{
		alert('Selecione o produto');

		return;
	}
	
	$('button[data-loading-text]').button('loading');

	$.ajax({
		url: form.attr('action')+'/'+site,
		method: 'POST',
		dataType : 'json',
		data: new FormData(form[0]),
		contentType: false,  
		cache: false,
		processData: false,
	})

	.done(function(message)
	{
		if(message[0] == 'success')
		{
			alert(message[1]);

			form[0].reset();

			$('#modal-password').modal('hide')
		}
		else
		{
			alert('ATENÇÃO! '+message[1])
		}
	})

	.fail(function()
	{
		alert("Falha ao enviar a oferta. Tente novamente mais tarde");
	})

	.always(function()
	{
		$('button[data-loading-text]').button('reset');

		grecaptcha.reset();
	})

	return false;
});