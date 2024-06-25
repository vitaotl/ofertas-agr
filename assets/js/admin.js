
if($('.datatable').length)
{
	languageDatatable = {
		'sEmptyTable': 'Nenhum registro encontrado',
		'sInfo': 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
		'sInfoEmpty': 'Mostrando 0 até 0 de 0 registros',
		'sInfoFiltered': '(Filtrados de _MAX_ registros)',
		'sInfoPostFix': '',
		'sInfoThousands': '.',
		'sLengthMenu': 'Mostrar _MENU_ por página',
		'sLoadingRecords': 'Carregando...',
		'sProcessing': 'Aguarde...',
		'sZeroRecords': 'Nenhum registro encontrado',
		'sSearch': 'Pesquisar: ',
		'oPaginate': {
			'sNext': 'Próximo',
			'sPrevious': 'Anterior',
			'sFirst': 'Primeiro',
			'sLast': 'Último'
		},
		'oAria': {
			'sSortAscending': 'Ordenar colunas de forma ascendente',
			'sSortDescending': 'Ordenar colunas de forma descendente'
		}
	};

	var url = $('.datatable').data('url')

	$('.datatable').each(function()
	{
	   var order_col = $(this).data('order-col');
	   var order_dir = $(this).data('order-dir');
	   var ordering = $(this).data('ordering');

	   order_col = (order_col) ? order_col : 0;
	   order_dir = (order_dir) ? order_dir : 'asc';
	   ordering = (ordering) ? ordering : true;


		$(this).DataTable({
			language : languageDatatable,
			lengthChange: false,
			deferRender: true,
			processing: true,
			paging: true,
			info: true,
			searching: false,
			serverSide: true,
			ajax: {url: url},
			ordering: false,
			pageLength: 20,
			responsive: false,
			bFilter: false,
    		bLengthChange: false,
		})
	})
};


if($('#sites_views').length)
{
	loadChartVisits();
}

$('form#form-chart :input').change(function()
{
	loadChartVisits();
})

function loadChartVisits()
{
	$.get('dashboard/chart', $('form#form-chart').serialize())

	.done(function(data)
	{
		Highcharts.chart('sites_views', {
			credits: {
				enabled: false
			},
			xAxis: {
				categories: data.titles,
			},
			title: {
				text: '',
			},
			yAxis: {
				gridLineColor: 'rgba(0, 0, 0, 0.3)',
				title: {
					enabled:false
				},
			},
			series: [{
				type: 'area',
				color: '#1ab28c',
				name: 'Visitas',
				data: data.values
			}],
		});
	})
}
