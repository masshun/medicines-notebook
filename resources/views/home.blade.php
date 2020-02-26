@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <!--@if(Auth::check())
                <div class="card-header">こんにちは！{{ $user->name }}さん</div>
            @endif-->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインしました
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
