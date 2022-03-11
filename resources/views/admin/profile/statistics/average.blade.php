@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
               
                <div class="panel-body">
                    <div class="box_button">
                        <div class="button_years">
                            @foreach ($years as $year)
                                <a class="link_statistics" href="{{route('admin.statistic.year',$year)}}">
                                    <span class="statistics_btn {{$year_selected == $year ? 'active' : ''}} ">
                                        {{$year}}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                        <a class="link_statistics" href="{{route('admin.statistic.count')}}">
                            <span class="statistics_btn sum ">
                                Count
                            </span>
                        </a>
                    </div>
                    <canvas id="canvas" height="280" width="600"></canvas>
                    
                </div>
               
            </div>
        </div>
    </div>
   
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var months = <?php echo $months; ?>;
    var average_vote = <?php echo $average_vote; ?>;
    Chart.defaults.global.defaultFontColor = "#fff";
   
    var barChartData = {
        labels: months,
        datasets: [{
            label: 'Average',
            backgroundColor: "#FF4D5A",
            data: average_vote
        }]
    };

    window.onload = function() {
        
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
           
           
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                        
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Media voti per mese ed anno'
                    
                }
            }
        });
       
    };
</script>
@endsection