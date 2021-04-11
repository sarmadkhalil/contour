<div>
{!! $chart->container() !!}
    <div class="row">
    
    @foreach ($users as $user)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="pl-5 col-md-4">
                            <img style="height: 100px;" src="{{asset('img/user/user.png')}}" alt="">
                        </div>
                        <div class="mt-4 ml-0 col-md-8">
                            <div class="row">
                                <h3 class="card-title">{{$user->name}}</h3>
                            </div>
                            <div class="row">
                                <h6 class="mb-2 card-subtitle text-muted">{{$user->occupation}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                        
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
        @endforeach
    </div>
</div>
