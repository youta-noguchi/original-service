@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>管理者用ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'seller.authenticate']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログインして管理画面へ', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
@endsection