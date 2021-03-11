
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Column chart
        var options = {
            chart: {
                height: 350,
                type: "bar",
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: "rounded",
                    columnWidth: "55%",
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"]
            },
            series: [{
                name: "Open",
                data: [
                        '{{ $openjan }}', '{{ $openfeb }}','{{ $openmar }}','{{ $openapr }}','{{ $openmay }}','{{ $openjune }}',
                        '{{ $openjul }}', '{{ $openaug }}','{{ $opensep }}','{{ $openoct }}','{{ $opennov }}','{{ $opendec }}'
                    ]
            }, {
                name: "Closed",
                data: [
                        '{{ $closedjan }}', '{{ $closedfeb }}','{{ $closedmar }}','{{ $closedapr }}','{{ $closedmay }}','{{ $closedjune }}',
                        '{{ $closedjul }}', '{{ $closedaug }}','{{ $closedsep }}','{{ $closedoct }}','{{ $closednov }}','{{ $closeddec }}'
                    ]
            }, {
                name: "Cancelled",
                data: [
                        '{{ $canjan }}', '{{ $canfeb }}','{{ $canmar }}','{{ $canapr }}','{{ $canmay }}','{{ $canjune }}',
                        '{{ $canjul }}', '{{ $canaug }}','{{ $cansep }}','{{ $canoct }}','{{ $cannov }}','{{ $candec }}'
                    ]
            }],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            },
            yaxis: {
                title: {
                    text: "no. of appointments"
                }
            },
            fill: {
                opacity: 2
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "total: " + val 
                    }
                }
            }
        }
        var chart = new ApexCharts(
            document.querySelector("#apexcharts-column"),
            options
        );
        chart.render();
    });
</script>
