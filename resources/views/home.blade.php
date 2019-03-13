@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h4>Show Information</h4>
                        <label>Full Name :</label>
                        {{ Auth::user()->first_name." ".Auth::user()->last_name }}<br>
                        <label>Gender :</label>
                        {{ Auth::user()->gender==0? 'ช':'ญ' }}<br>
                        <label>ID Card :</label>
                        {{ Auth::user()->id_card }}<br>
                        <label>Address :</label>
                        {{ Auth::user()->address }}<br>
                        <label>Birthday :</label>
                        {{ Auth::user()->date }}<br>
                        <label>Email Address :</label>
                        {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
