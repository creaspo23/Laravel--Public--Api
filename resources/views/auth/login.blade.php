@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome Back</div>

                    <div class="panel-body ml-4 text-center">
                         <a href="{{ route('admin.login') }}"><p>Login As Admin</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection