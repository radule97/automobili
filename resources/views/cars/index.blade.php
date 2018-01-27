@extends('layouts.app')

@section('content')

    <div class="row render">

        <div class="col-lg-3">

            <h1 class="my-4">Shop Name</h1>
            <form action="/cars" method="GET" class="category-form">
            {{ csrf_field() }}
            <select class="category-select" name="category_id" style="width: 200px;">
                    <option selected value="0" >All</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                @endforeach
            </select>
            </form>

        </div>
        <div class="col-lg-9">
            @if($isAdmin)
            <hr>
                {{--admin approve--}}
                <div class="row">
                    @foreach($allCars as $carA)
                        <a href="/cars/{{$carA->id}}">
                            <div class="col-lg-3" style="margin: 15px; padding: 0;height: 340px; border: 2px solid #3097d1; overflow: hidden;">
                                <img  src="images/{{$carA->car_img}}" alt="" style="width: 217px; height: 150px;">
                                <div style="padding: 10px;">
                                    <h4 class="card-title">
                                        <p href="#">{{substr($carA->car_name, 0 , 20).".."}}</p>
                                    </h4>
                                    <h5>{{$carA->car_price}}&euro;</h5>
                                    <p class="id-category" style="display: none;" >{{$carA->category_id}}</p>
                                    <p class="card-text">The car passed: {{$carA->car_mileage}}km</p>
                                    <p>status: @if($carA->status === 0) deleted @elseif($carA->status === 1) on hold @else allowed @endif</p>
                                    @if($carA->status === 1)
                                        <form method="POST" action="/admin/delete" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$carA->id}}">
                                            <input type="submit"  value="delete" style="background: #fa4841; color: #ffffff; display: inline-block; border: 1px solid rgba(255,215,238,0); float: left;">
                                        </form>
                                        <form method="POST" action="/admin/allow" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$carA->id}}">
                                            <input type="submit"  value="allow" style="background: #00b116; color: #ffffff; display: block; border: 1px solid rgba(255,215,238,0); float: right;">
                                        </form>
                                    @elseif($carA->status === 0)
                                        <form method="POST" action="/admin/allow" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$carA->id}}">
                                            <input type="submit"  value="allow" style="background: #00b116; color: #ffffff; display: block; border: 1px solid rgba(255,215,238,0); float: right;">
                                        </form>
                                    @else
                                        <form method="POST" action="/admin/delete" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$carA->id}}">
                                            <input type="submit"  value="delete" style="background: #fa4841; color: #ffffff; display: inline-block; border: 1px solid rgba(255,215,238,0); float: left;">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="car-pagination" style="width: 255px; margin: 0 auto;">{{ $allCars->links() }}</div>
            {{--end admin--}}
            <hr>
            @else
            <div class="row">
                @foreach($cars as $car)
                <a href="/cars/{{$car->id}}">
                <div class="col-lg-3" style="margin: 15px; padding: 0;height: 340px; border: 2px solid #3097d1; overflow: hidden;">
                        <img  src="images/{{$car->car_img}}" alt="" style="width: 217px; height: 150px;">
                           <div style="padding: 10px;">
                                <h4 class="card-title">
                                    <p href="#">{{$car->car_name}}</p>
                                </h4>
                                <h5>{{$car->car_price}}&euro;</h5>
                                <p class="id-category" style="display: none;">{{$car->category_id}}</p>
                                <p class="card-text">The car passed: {{$car->car_mileage}}km</p>
                           </div>
                </div>
                </a>
                @endforeach
            </div>
            <div class="car-pagination" style="width: 255px; margin: 0 auto;">{{ $cars->links() }}</div>
            <!-- /.row -->
            @endif

        </div>

        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
    <script type="text/javascript" src="js/pagination.js" ></script>

@endsection