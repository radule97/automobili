@extends('layouts.app')

@section('content')
    @if($isAdmin)

    <div class="container">
      <div class="admin-buttons">
            <img  src="/images/{{$car->car_img}}" alt="">
               <div style="padding: 10px;">
                    <h4 class="card-title">
                        <p href="#">{{$car->car_name}}</p>
                    </h4>
                    <h5>{{$car->car_price}}&euro;</h5>
                    <p class="id-category" style="display: none;">{{$car->category_id}}</p>
                    <p class="card-text">The car passed: {{$car->car_mileage}}km</p>
               </div>

                 @if($car->status === 1)
                     <form method="POST" action="/admin/delete" >
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$car->id}}">
                         <input type="submit"  value="delete" style="background: #fa4841; color: #ffffff; display: inline-block; border: 1px solid rgba(255,215,238,0); float: left;">
                     </form>
                     <form method="POST" action="/admin/allow" >
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$car->id}}">
                         <input type="submit"  value="allow" style="background: #00b116; color: #ffffff; display: block; border: 1px solid rgba(255,215,238,0); float: right;">
                     </form>
                 @elseif($car->status === 0)
                     <form method="POST" action="/admin/allow" >
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$car->id}}">
                         <input type="submit"  value="allow" style="background: #00b116; color: #ffffff; display: block; border: 1px solid rgba(255,215,238,0); float: right;">
                     </form>
                 @else
                     <form method="POST" action="/admin/delete" >
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$car->id}}">
                         <input type="submit"  value="delete" style="background: #fa4841; color: #ffffff; display: inline-block; border: 1px solid rgba(255,215,238,0); float: left;">
                     </form>
                 @endif
               </div>
    </div>
    <style>
      .admin-buttons {
        width: 400px;
        border:1px solid rgb(55, 25, 205);
        overflow: hidden;
        margin: 0 auto;
      }
    </style>
    @else
    <div class="container">
            <img  src="/images/{{$car->car_img}}" alt="">
               <div style="padding: 10px;">
                    <h4 class="card-title">
                        <p href="#">{{$car->car_name}}</p>
                    </h4>
                    <h5>{{$car->car_price}}&euro;</h5>
                    <p class="id-category" style="display: none;">{{$car->category_id}}</p>
                    <p class="card-text">The car passed: {{$car->car_mileage}}km</p>
               </div>
    </div>
    @endif

@endsection
