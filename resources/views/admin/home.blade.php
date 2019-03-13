
@extends('admin.layouts.main_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <label>สวัสดีคุณ :</label>
                        {{ Auth::user()->first_name." ".Auth::user()->last_name }}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
