@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Apply for leave</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/leave/apply') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">Start Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <select id="start_date_time" class="form-control" name="start_date_time" required>
                                	<option value="am">Morning</option>
                                	<option value="pm">Afternoon</option>
                            	</select>
                                @if ($errors->has('start_date_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="return_date" class="col-md-4 control-label">Return Date</label>

                            <div class="col-md-6">
                                <input id="return_date" type="date" class="form-control" name="return_date" required>

                                @if ($errors->has('return_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('return_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <select id="return_date_time" class="form-control" name="return_date_time" required>
                                	<option value="am">Morning</option>
                                	<option value="pm">Afternoon</option>
                            	</select>
                                @if ($errors->has('return_date_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('return_date_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('leave_type') ? ' has-error' : '' }}">
                            <label for="leave_type" class="col-md-4 control-label">Leave type</label>

                            <div class="col-md-6">
                                <select id="leave_type" class="form-control" name="leave_type" required>
	                                @foreach ($leave_types as $leave_type)
	                                	<option value="{{ $leave_type->id }}">{{ $leave_type->type }}</option>
                                	@endforeach
                            	</select>

                                @if ($errors->has('leave_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('leave_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
