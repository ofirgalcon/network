<div class="col-md-4">
	<div class="card">
		<div class="card-heading">
			<i class="fa fa-globe"></i>
			<span data-i18n="network.widget.network_location"></span>
			<a href="/show/listing/network/network" class="pull-right"><i class="fa fa-list"></i></a>
		</div>
		<div id="ip-card" class="card-body text-center">
			<svg id="network-plot" style="width:100%; height: 300px"></svg>
		</div>
	</div><!-- /card -->
</div><!-- /col -->

<script>
	$(document).on('appReady', function() {

		function isnotzero(point)
		{
			return point.cnt > 0;
		}

		var url = appUrl + '/module/reportdata/ip'
		var chart;
		d3.json(url, function(err, data){

			var height = 300;
			var width = 350;

			// Filter data
			data = data.filter(isnotzero);

			nv.addGraph(function() {
				var chart = nv.models.pieChart()
					.x(function(d) { return d.key })
					.y(function(d) { return d.cnt })
					.showLabels(false);

				chart.title("" + d3.sum(data, function(d){
					return d.cnt;
				}));

				chart.pie.donut(true);

				d3.select("#network-plot")
					.datum(data)
					.transition().duration(1200)
					.style('height', height)
					.call(chart);

				// Adjust title (count) depending on active slices
				chart.dispatch.on('stateChange.legend', function (newState) {
					var disabled = newState.disabled;
					chart.title("" + d3.sum(data, function(d, i){
						return d.cnt * !disabled[i];
					}));
				});

				return chart;
			});
		});
	});
</script>
