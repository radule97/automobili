@extends('layouts.app')
@section('content')
<div class="container">

    <form method="POST" action="/cars" enctype="multipart/form-data"      style="padding: 150px 200px;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="price">Price</label><br>
            <input type="number" name="price"  class="form-control" id="price" value="&euro;" placeholder="Enter Price in euros" style="width: 95%; display: inline-block;">
            <span style="font-size: 16px; font-weight: bold;">&nbsp; &euro;</span>

        </div>
        <div class="form-group">
            <label for="year">Year</label>
                <input type="date" name="year"  class="form-control" id="year" placeholder="Enter Year">

        </div>
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="text" name="mileage"  class="form-control" id="mileage" placeholder="Enter Mileage">

        </div>
        <div class="form-group">
            <select class="form-control" name="category">
                @foreach($categories as $category)
                    <option>{{$category->cat_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="img" id="img">
        </div>

        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>
@endsection