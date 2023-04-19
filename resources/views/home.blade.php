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
                        <h3 class="p-3 mb-2 bg-warning">Welcome</h3>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        
    </div>
    <div class="row" justify-content-center>
        <div class="col-md-12 p-3 mt-2">
            <div class="card">
                <div class="card-header">{{ __('Report') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h3 class="p-3 mb-2 bg-success justify-content-center">1st quartar report</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
