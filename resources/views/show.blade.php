@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="mauto text-center" style="color: #0b03a6;">おくすりの詳細</h2>
        </div>
        <div class="card-body d-flex">
            <section class="medicine-main">
                <div>
                <h2 class="h2 text-secondary">お薬の名前</h2>
                <p class="h2 mb20" style="color: #0b03a6;">{{ $medicine->name }}</p>
                </div>
                
                <h2 class="h2 border-top pt20 text-secondary">服用するタイミング</h2>
                <ul class="list-group list-group-flush" style="flex-direction:row;"> 
                    
                        <li style="list-style:none;" class="mb20">
                            <span class="badge p10" style="font-size:1.4rem; background-color:#02c2f8; color:white;">
                            {{ $medicine->timing }}                        
                        (
                        @if($medicine->timezone != '')
                        {{ $medicine->timezone }}
                        @else
                        指定なし
                        @endif
                        )
                            </span>                                
                        </li>                           
                     
                </ul>
                            
                <h2 class="h2 border-top pt20 text-secondary">処方期間</h2> 
                <p class="h2 mb20" style="color: #0b03a6;">{{ $medicine->term }}</p>

                <h2 class="h2 border-top pt20 text-secondary">1回あたり服用する量</h2>
                <p class="h2 mb20" style="color: #0b03a6;">{{ $medicine->quantity }}</p>

                <h2 class="h2 border-top pt20 text-secondary">特記事項</h2>
                @if($medicine->body)
                <p class="h2 pb20" style="color: #0b03a6;">{{ $medicine->body }}</p>
                @else
                <p class="h2 pb20" style="color: #0b03a6;">特になし</p>
                @endif
            </section>
            <aside>
            @if(!empty($medicine->image))
            <img class="medicine-image" src="/thumbnail/{{ $medicine->image }}">
            @else
            <img class="medicine-image" src="{{ asset('images/meme1.png') }}">
            @endif
            </aside>
        </div>
        <div style="display:inline;" class="text-center">
        <a href="{{ route('index') }}" class="btn btn-info btn-back mb20" style="margin:5px;">一覧へ戻る</a>
        <a href="{{ route('edit',['id' => $medicine->id ]) }}" class="btn btn-warning btn-back mb20" style="margin:5px;">編集</a>
        <a href="{{ route('destroy', ['id' => $medicine->id ]) }}" class="btn btn-danger btn-back mb20" style="margin:5px;">削除</a>
        </div>
    </div> 
</div>
@endsection