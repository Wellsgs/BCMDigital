<?php include "header.php" ?>

<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li class='active'><a href="inicio.php">Início</a></li>
            </ol>

            <h1>Acesso negado!</h1>
            
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                            <h1 style="color:black;!important">Desculpe!</h1>               
                            <h2 style="color:black;!important">Não encontramos a galeria selecionada.</h2>
                                        
                            <div class="error-actions">
                                <a href="javascript:;" onclick="window.history.back()" class="btn btn-primary btn-lg">
                                    <i class="icon-chevron-left"></i> Voltar                        
                                </a>                                    
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!--wrap -->
</div> <!-- page-content -->

<?php include "footer.php" ?>

<script type='text/javascript' src='assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='assets/js/bootstrap.min.js'></script> 
<script type='text/javascript' src='assets/js/enquire.js'></script> 
<script type='text/javascript' src='assets/js/jquery.cookie.js'></script> 
<script type='text/javascript' src='assets/js/jquery.nicescroll.min.js'></script> 
<script type='text/javascript' src='assets/plugins/codeprettifier/prettify.js'></script> 
<script type='text/javascript' src='assets/plugins/easypiechart/jquery.easypiechart.min.js'></script> 
<script type='text/javascript' src='assets/plugins/sparklines/jquery.sparklines.min.js'></script> 
<script type='text/javascript' src='assets/plugins/form-toggle/toggle.min.js'></script> 
<script type='text/javascript' src='assets/js/placeholdr.js'></script> 
<script type='text/javascript' src='assets/js/application.js'></script> 
<script type='text/javascript' src='assets/demo/demo.js'></script> 

<script src="../public/js/highcharts/highcharts.js"></script>
<script src="../public/js/highcharts/highcharts-3d.js"></script>
<script src="../public/js/highcharts/modules/exporting.js"></script>

<script>
/*$(function () {     

    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });    

    //grafico processos
    $.getJSON("../controller/data-highcharts-processos.php", function(json) {

        if(json == "Nenhum resultado encontrado."){
            $('#processos').html("Nenhum resultado encontrado.");            
            return false;
        }       

        // Build the chart
        $('#processos').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'STATUS DOS PROCESSSOS ADMINISTRATIVOS'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Status dos Processos Administrativos',
                data: json
            }]
        });

    });

    //grafico processos
    $.getJSON("../controller/data-highcharts-processos-jud.php", function(json) {

        if(json == "Nenhum resultado encontrado."){
            $('#processos2').html("Nenhum resultado encontrado.");            
            return false;
        }       

        // Build the chart
        $('#processos2').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'STATUS DOS PROCESSSOS JUDICIAIS'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Status dos Processos Judiciais',
                data: json
            }]
        });

    });


});
*/
</script>
