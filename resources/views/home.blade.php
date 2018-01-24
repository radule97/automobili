@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! {{$user->name}}<br>
                        @if($isAdmin)
                            <br>
                            ADMIN PANEL :
                        | <a href="/admin">Admin Panel</a> | <br><br>
                        @endif
                        | <a href="/cars/create">Create Car Post</a> | <a href="/cars">See All Posts</a> |
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
