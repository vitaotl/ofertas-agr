$.fn.button = function(action)
{
	if(action === 'loading' && this.data('loading-text'))
	{
		this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
	}
	else if(action === 'reset' && this.data('original-text'))
	{
		this.html(this.data('original-text')).prop('disabled', false);
	}
};

$('a[data-loading-text]').click(function()
{
	$(this).button('loading');
});

$('[data-loading-text]').closest('form').submit(function()
{
	$(this).find('[type=submit]').button('loading');
});

$('[data-toggle="tooltip"]').tooltip({html : true});

if($('.datepicker').length)
{
	$('.datepicker').attr('autocomplete', 'off');

	$('.datepicker').datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','SÃ¡b','Dom'],
		monthNames: ['Janeiro','Fevereiro','MarÃ§o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		nextText: 'Próximo',
		prevText: 'Anterior'
	});
}

if($('.mask').length)
{
	$(' .mask.mask-date').mask('99/99/9999', {placeholder: '__/__/____'});
	$(' .mask.mask-month').mask('99/9999', {placeholder: '__/____'});
	$(' .mask.mask-time').mask('99:99', {placeholder: '__:__'});
	$(' .mask.mask-cep').mask('99.999-999', {placeholder: '__.___-___'});
	$(' .mask.mask-cpf').mask('999.999.999-99', {placeholder: '___.___.___'});
	$(' .mask.mask-cnpj').mask('99.999.999/9999-99', {placeholder: '__.____.____/____-__'});   
	$(' .mask.mask-phone').mask('(99) 9 9999-9999', {placeholder: '(__) ____-____  '});
}

if($('.maskMoney').length)
{
	$('.maskMoney').maskMoney({decimal: ',', allowEmpty:true, allowZero:true, selectAllOnFocus:true});
}


$(document.body).on('click', '[data-confirm]', function()
{
	var confirm = window.confirm($(this).data('confirm'));
	if(!confirm)
	{
		return false;
	}
});

$('form#form-solicitation').submit(function()
{
	let form = $(this);

	$.post(form.attr('action'), form.serializeArray())

	.done(function(message)
	{
		if(message[0] == 'success')
		{
			alert(message[1])
		}
		else
		{
			alert('ATENÇÃO! '+message[1])
		}
	})

	.fail(function()
	{
		alert("Falha ao enviar a solicitação. Tente novamente mais tarde");
	})

	.always(function()
	{
		$('button[data-loading-text]').button('reset');

		grecaptcha.reset();
	})

	return false;
});