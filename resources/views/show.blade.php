@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="mauto text-center">おくすりの詳細</h2>
        </div>
        <div class="card-body d-flex">
            <section class="medicine-main">
                <div>
                <h2 class="h2">お薬の名前</h2>
                <p class="h2 mb20">{{ $medicine->name }}</p>
                </div>
                
                <h2 class="h2 border-top pt20">服用するタイミング</h2>
                <ul class="list-group list-group-flush" style="flex-direction:row;"> 
                            @if ($medicine->timezone != "")
                            @foreach(explode(',', $medicine->timezone) as $info)
                                <li style="list-style:none;" class="mb20">
                                @if($info == '朝')
                                    <span class="badge badge-primary mr10 p10" style="font-size:1.4rem;">朝</span>
                                @endif
                                @if($info == '昼')
                                    <span class="badge badge-warning mr10 p10" style="font-size:1.4rem;">昼</span>
                                @endif
                                @if($info == '夜')
                                    <span class="badge badge-dark mr10 p10" style="font-size:1.4rem;">夜</span>
                                @endif
                                @if($info == '食前')
                                    <span class="badge badge-light mr10 p10" style="font-size:1.4rem; white-space:normal;">食前</span>
                                @endif
                                @if($info == '食後')
                                    <span class="badge badge-secondary mr10 p10" style="font-size:1.4rem; white-space:normal;">食後</span>
                                @endif
                                
                                </li>                           
                            @endforeach
                            @endif
                </ul>
                            
                <h2 class="h2 border-top pt20">処方期間</h2> 
                <p class="h2 mb20">{{ $medicine->term }}</p>

                <h2 class="h2 border-top pt20">1回あたり服用する量</h2>
                <p class="h2 mb20">{{ $medicine->quantity }}</p>

                <h2 class="h2 border-top pt20">特記事項</h2>
                @if(empty($medicine->body))
                <p class="h2 pb20">特になし</p>
                @else
                <p class="h2 pb20">{{ $medicine->body }}</p>
                @endif
            </section>
            <aside>
            @if(!empty($medicine->image))
            <img class="medicine-image" src="{{ asset('storage/images/'.$medicine->image) }}">
            @else
            <img class="medicine-image" src="{{ asset('images/medicine.png') }}">
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