@extends('layouts.master')
@section('title')
    Users
@endsection
@section('content')
<style>
.profile {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  background: #512DA8;
  font-size: 35px;
  color: #fff;
  text-align: center;
  line-height: 70px;
  margin: 20px 0;
}
</style>
    <div class="row">
        <div class="col-md-12">
            <span class="font-weight-bold">Sort By:</span>
            <a class="ml-3" href="{{ URL::current() }}">All</a>
            <a class="ml-3" href="{{ URL::current().'?sort=name_asc' }}">Name - Ascending</a>
            <a class="ml-3" href="{{ URL::current().'?sort=name_desc' }}">Name - Descending</a>
            <a class="ml-3" href="{{ URL::current().'?sort=impression_asc' }}">Impressions - Ascending</a>
            <a class="ml-3" href="{{ URL::current().'?sort=impression_desc' }}">Impression - Descending</a>
        </div>
    </div>
    <div class="row">
    @foreach ($users as $user)
        <div class="py-4 col-md-4">
            <div class="card h-100 ">
                <div class="card-body">
                    <div class="row">
                        <div class="pl-3 col-lg-3">
                            @if ($user->avatar != '')
                                <img style="height: 100px;" src="{{$user->avatar}}" alt="">
                            @else
                                <div class="profile" id="profileImage_{{$user->id}}"></div>
                            @endif
                        </div>
                        <div class="mt-lg-4 col-lg-9">
                            <div class="row">
                                <h3 class="card-title" id = "">{{$user->name}}</h3>
                            </div>
                            <div class="row">
                                <h6 class="mb-2 card-subtitle text-muted">{{$user->occupation}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div>
                                <canvas id="myChart_{{$user->id}}"></canvas>
                            </div>
                            <div>
                                <?php
                                $dateSmall = strtotime($user->userLogs->min('time')); 
                                $dateLarge = strtotime($user->userLogs->max('time')); 
                                ?>
                                <p class="text-bold">Conversions <?php echo date('m/d', $dateSmall).' - '.date('m/d', $dateLarge); ?></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <p class="mb-0">{{$user->userLogs->where('type', 'impression')->count('type')}}</p>
                            <p class="mt-0 text-muted">Impressions</p>
                            <p class="mt-3 mb-0">{{$user->userLogs->where('type', 'conversion')->count('type')}}</p>
                            <p class="mt-0 text-muted">Conversions</p>
                            <p class="mt-3 mb-0">{{$user->userLogs->sum('revenue')}}</p>
                            <p class="mt-0 text-muted">Revenue</p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var firstName = "<?php echo $user->name ?>";
                var intials = firstName.charAt(0);
                var profileImage = $('#profileImage_<?php echo $user->id ?>').text(intials);
                let post<?php echo $user->id ?> = new Object();
            post<?php echo $user->id ?>._token = "{{ csrf_token() }}";
            post<?php echo $user->id ?>.id = <?php echo $user->id ?>;
            $.ajax({
                type:'POST',
                url:'{{ asset("users/charts") }}',
                data:post<?php echo $user->id ?>,
                success:function(response){
                    var data = JSON.parse(JSON.stringify(response));
                    // console.log(data);
                    var date<?php echo $user->id ?> = data.map(function(elem){
                        return elem.date; 
                    });
                    var count<?php echo $user->id ?> = data.map(function(elem){
                        return elem.count; 
                    });
                    let myChart<?php echo $user->id ?> = document.getElementById('myChart_<?php echo $user->id ?>').getContext('2d');

                    var myLineChart<?php echo $user->id ?> = new Chart(myChart<?php echo $user->id ?>, {
                        type: 'line',
                        data: {
                            labels:  date<?php echo $user->id ?>,
                            datasets: [{
                                label: 'users',
                                data: count<?php echo $user->id ?>,
                                borderColor: 'rgb(75, 192, 192)',
                                fill: false,
                                tension: 0.1
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        color: "rgba(0, 0, 0, 0)",
                                    },
                                    ticks: {
                                        display: false //this will remove only the label
                                    }
                                }],
                                yAxes: [{
                                    gridLines: {
                                        color: "rgba(0, 0, 0, 0)",
                                    },
                                    ticks: {
                                        display: false //this will remove only the label
                                    }   
                                }]
                            }
                        }
                    });
                    }
            });
            });

            
        </script>
        @endforeach
    </div>

        <div class="row">
            {{$users->links()}}
        </div>
@endsection
