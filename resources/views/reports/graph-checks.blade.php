<div class="panel panel-default animated fadeInUp">
	<div class="panel-heading clearfix"> 
			Uso del mes
		<ul class="panel-tool-options"> 
			<li class="dropdown">
			 </li>
			<li><a data-rel="reload" class="ajax" href="{{ route('get-checks-month-graph') }}"><i class="icon-arrows-ccw"></i></a></li>
		</ul> 
	</div> 
	<!-- panel body --> 
	<div class="panel-body"> 
		<div id="flot-line-chart" style="height:300px;"></div>
	</div> 
</div> 

<script>
$(function () {
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                            opacity: 0.0
                        }, {
                            opacity: 0.0
                        }]
                }
            }
        },
        xaxis: {
            tickDecimals: 0
        },
		yaxis: {
            tickDecimals: 0
        },
        colors: ["#00b8ce"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth: 0
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "Dia: %x, Chequeos: %y"
        }
    };
    var barData = {
        label: "bar",
        data:{!! $json !!}
    };
	
    $.plot($("#flot-line-chart"), [barData], barOptions);

});
</script>