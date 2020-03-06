@extends('layouts.app')
@section('css')
<style>
.card-horizontal {
    display: flex;
    flex: 1 1 auto;
}

.img-square-wrapper{
    width:30%;
    height:100%;
}

.card-link:hover{/* マウスオーバー時に色変更*/
    box-shadow:3px 3px 3px rgba(0,0,0,0.5);
    text-decoration: none;
}
.card-blade-img{

}
.card-body {
    position: relative;
    
}

.card-body p {
    
    position: absolute;
    top: 55%;
    padding-top: 1%;
}

.card-body h3{
   position: absolute;
   top: 30%;
}

@media(max-width: 1300px){
    .card-body h3{
        font-size: 1.3em;

    }

    .card-body p {
       font-size: 0.8em;
    }

}

@media(max-width: 767px){
    .card-body h3{
        font-size: 1.3em;

    }

    .card-body p {
       font-size: 0.7em;
    }

}

</style>
@endsection
@section('content')
@auth

<div class="container-fluid">
    <div class="row">
    @foreach($medicines as $medicine)
        <div class="col-xs-12 col-md-6 col-lg-4 mt-3">
            <a class="card border-primary card-link" href="{{ route('show', ['id' => $medicine->id ]) }}">
            
                <div class="card-horizontal">
                    <div class="img-square-wrapper">
                    @if($medicine->image)
                        <img class="card-blade-img" src="/thumbnail/{{ $medicine->image }}" alt="投稿された画像">
                    @else
                        <img class="card-blade-img" src="{{ asset('../images/meme1.png') }}" alt="デフォルト画像">
                    @endif
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" style="color: #0b03a6;">{{ $medicine->name }}</h3>
                        <p>
                        <i class="far fa-clock"></i>
                        {{ $medicine->timing }}
                        
                        (
                        @if($medicine->timezone != '')
                        {{ $medicine->timezone }}
                        @else
                        指定なし
                        @endif
                        )
                        
                        <span class="ml10"><i class="fas fa-pills"></i>({{ $medicine->quantity }})</span></p>
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">特記事項：{{ $medicine->body }}</small>
                </div>
            </a>
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