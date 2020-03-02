@extends('layouts.app')
@section('css')
<style>
.card-horizontal {
    display: flex;
    flex: 1 1 auto;
}

.img-square-wrapper{
    width:30%;
}

.linkbox a:hover{/* マウスオーバー時に色変更*/
    opacity: 0.1;
    background-color: #85e6ff;
    box-shadow:8px 8px 9px rgba(0,0,0,0.5);
}

.linkbox {
    position: relative;
}
.linkbox a {
    position: absolute;
    top: 0;
    left: 0;
    height:100%;
    width: 100%;
}
.card-blade-img{

}
</style>
@endsection
@section('content')
@auth

<div class="container-fluid">
    <div class="row">
    @foreach($medicines as $medicine)
        <div class="col-xs-12 col-md-6 mt-3">
            <div class="card border-primary linkbox">
            <a href="{{ route('show', ['id' => $medicine->id ]) }}"></a>
                <div class="card-horizontal">
                    <div class="img-square-wrapper" style="position:relative;">
                        <img class="card-blade-img" src="{{ asset('../images/meme1.png') }}" alt="Card image cap" style="">
                    </div>
                    <div class="card-body" style="">
                        <h1 class="card-title">{{ $medicine->name }}<span>({{ $medicine->quantity }})</span></h1>
                        <p class="badge p10 m-0" style="background-color:#02c2f8; color:white; font-size:20px;">
                        
                        {{ $medicine->timing }}
                        
                        (@foreach(explode(',', $medicine->timezone) as $info)
                        {{ $info }}
                        @endforeach)
                        
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">特記事項：{{ $medicine->body }}</small>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="row justify-content-center">
            {{ $medicines->appends(request()->input())->links() }}
    </div>
</div>

@endauth
@endsection
@section('footer')
@endsection