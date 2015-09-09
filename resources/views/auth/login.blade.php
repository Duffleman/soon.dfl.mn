@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">

                    <div class="card text-center m-t">
                        <div class="card-header">
                            <h4 class="card-title m-y-0">Login</h4>
                        </div>
                        <div class="card-block">
                            <form action="/auth/login" method="POST">
                                {!! csrf_field() !!}
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 form-control-label">Email</label>
                                    <div class="col-sm-10 text-left">
                                        <input type="email" class="form-control" id="email" name="email">
                                        {!! $errors->first('email', '<small class="text-muted">:message</small>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 form-control-label">Pass</label>
                                    <div class="col-sm-10 text-left">
                                        <input type="password" class="form-control" id="password" name="password">
                                        {!! $errors->first('password', '<small class="text-muted">:message</small>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success-outline btn-block">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    
@endsection