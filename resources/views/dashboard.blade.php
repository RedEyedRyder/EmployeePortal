@extends('layouts.app')
@section('pageTitle', 'Dashboard')

@section('content-top')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
