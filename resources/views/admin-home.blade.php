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
                        <h3 class="p-3 mb-2 bg-info">Admin Dashboard</h3>
                            <p class="text-success align-middle">new registered user</p>

                            @if(session('message'))
                                <div class="alert alert-danger">{{ session('message') }}</div>
                            @endif

                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($persons as $person)
                                        @if ($person->is_approved == 0)
                                            <tr>
                                                <td>{{ $person->name }}</td>
                                                <td>{{ $person->email }}</td>
                                                {{-- <td>
                                                   
                                                    <form method="POST" action="{{ route('update', $person->id) }}">
                                                        @csrf
                                                        <input hidden type="text" name="_method" value="PUT">
                                                        <button class="btn btn-success btn-sm" style="display: inline-block;" type="submit" name="action" >Accept</button>
                
                                                    </form> 
                                                    <br>
                                                    <form method="POST" action="{{ route('destroy', $person->id) }}">
                                                        @csrf                                                   
                                                        <input hidden type="text" name="_method" value="DELETE">
                                                        <button class="btn btn-danger btn-sm" style="display: inline-block;" type="submit" name="action" >Delete</button>
                                                    </form>
                                                                                                      
                                                </td> --}}
                                                <td>
                                                    <div class="row align-self-center">
                                                        <div class="col-3 ">
                                                            <form method="POST" action="{{ route('update', $person->id) }}">
                                                                @csrf
                                                                <input hidden type="text" name="_method" value="PUT">
                                                                <button class="btn btn-success btn-sm" type="submit" name="action">Accept</button>
                                                            </form>
                                                        </div>
                                                        
                                                        <div class="col-3">
                                                            <form method="POST" action="{{ route('destroy', $person->id) }}">
                                                                @csrf                                                   
                                                                <input hidden type="text" name="_method" value="DELETE">
                                                                <button class="btn btn-danger btn-sm" type="submit" name="action">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        @endif

                                    @endforeach

                                    @if ($persons->where('is_approved', 0)->count() == 0)
                                        <tr>
                                            <td colspan="3" class="text-primary fs-2">There are no pending users.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            
                        
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection