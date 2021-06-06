<!doctype html>
<html lang="en">
  <head>
    <title>User|Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  </head>
 
  <body>
    <div class="container">
     <div class="card-columns">
        <div class="row">
            
        </div>   
     </div>   
    </div>

    <div id="chart-container" style="height:400px;margin:auto;width:900px">   
    </div>



  <script src="https://code.highcharts.com/highcharts.js"></script>  
   <script>
        var datas = <?php echo json_encode($datas)?>;
        Highcharts.chart('chart-container', {
    title: {
        text: 'New User Growth 2021'
    },
    subtitle:{
        text:'Simreka'
    },
    xAxis: {
        categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
    },

    yAxis:{
        title:{
            text:'Number of Users'
        }
    },
    legend:{
        layout:'vertical',
        align:'right',
        verticalAlign:'middle'
    },
    plotOptions:{
        series:{
            allowPointSelect:true
        }
    },

     series:[{
        type:'column',
        name:'New Users',
        data:datas,
       
    }],
    responsive:{
        rules:{
            condition:{
                maxWidth:500
            },
            chartOptions:{
                legend:{
                    layout:'horizontal',
                    align:'center',
                    verticalAlign:'bottom'
                }
            }
        }
    }
    });

    

    </script>


  </body>    
</html>