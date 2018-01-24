@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                    <form method="POST" action="/admin"     style="padding: 150px 200px;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Make Category">
                    </form>

            </div>
        </div>
    </div>

@endsection