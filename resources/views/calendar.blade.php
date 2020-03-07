@extends('layouts.app')
@section('css')
@endsection

@section('content')
@auth
{!!$cal_tag!!}
@endauth
@endsection

@section('footer')
@endsection