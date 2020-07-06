<!DOCTYPE html>
<html>
<head>
	<title>My first chart using FusionCharts Suite XT</title>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container',
    width: '550',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Split of Revenue by Product Categories",
            "subCaption": "Last year",
            "numberPrefix": "$",
            "bgColor": "#ffffff",
            "startingAngle": "310",
            "showLegend": "1",
            "defaultCenterLabel": "Total revenue: $64.08K",
            "centerLabel": "Revenue from $label: $value",
            "centerLabelBold": "1",
            "showTooltip": "0",
            "decimals": "0",
            "theme": "fusion"
        },
        "data": [{
            "label": "Food",
            "value": "28504"
        }, {
            "label": "Apparels",
            "value": "14633"
        }, {
            "label": "Electronics",
            "value": "10507"
        }, {
            "label": "Household",
            "value": "4910"
        }]
    }
}
);
			chartObj.render();
		});
	</script>
	</head>
	<body>
		<div id="chart-container">FusionCharts XT will load here!</div>
	</body>
</html>