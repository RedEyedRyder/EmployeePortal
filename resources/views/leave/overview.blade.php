@extends('layouts.app')
@section('pageTitle', 'Leave Overview')

@section('content')
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">Upcomming Leave</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Start Date</th>
                                <th>Return Date</th>
                                <th>Total Leave</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leave as $leaveItem)
                                <tr>
                                    <td>{{$leaveItem->user->name}}</td>
                                    <td>
                                        @if (date('Gi', strtotime($leaveItem->start_date)) > 10)
                                            {{$leaveItem->start_date}} Afternoon
                                        @else
                                            {{$leaveItem->start_date}} Morning
                                        @endif
                                    </td>
                                    <td>
                                        @if (date('Gi', strtotime($leaveItem->return_date)) > 10)
                                            {{$leaveItem->return_date}} Afternoon
                                        @else
                                            {{$leaveItem->return_date}} Morning
                                        @endif
                                    </td>
                                    <td>{{round($leaveItem->days,1)}} Days</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
