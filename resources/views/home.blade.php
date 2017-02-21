@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ini apa ya ?</div>

                <div class="panel-body">
                    Login : <strong> Success </strong>
                    <br> 
                    Name : <strong> {{ Auth::user()->name }} </strong>
                    <br>
                    Email : <strong> {{ Auth::user()->email }} </strong>
                    <br>
                    Type of permissions : <strong> {{ Auth::user()->permission }} </strong>
                    <br>
                    Password : <strong> {{ Auth::user()->password }} (Greget :V)</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
