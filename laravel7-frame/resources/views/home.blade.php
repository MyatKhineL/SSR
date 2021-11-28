@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <i class="fas fa-home"></i>
                    {{ __('You are logged in!') }}
                    <button class="test btn btn-primary">test</button>

                        <br>
                    {{ Request::url() }}
                    <br>
                        <br>
                        <br>
                    {{Base::$description}}
                        <br>
                        <br>
                        <br>

                        {{Base::showName()}}
                        <br>
                        <br>
                        <br>

                        {{env("App_NAME")}}
                        <br>
                        <br>
                        <br>

                        {{env("App_DEV")}}

                        <br>
                        <br>
                        <br>


                        {{date('Y-m-d | h:i:s a')}}

                      <br>
                    <br>
                    {{$categories}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('foot')
    <script>
        $(".test").click(function (){
            alert("hello");
        })
    </script>
@endsection
