@extends('layouts.app')

@section('css')
@endsection

@section('content')
@auth
    <div class="container">
        <div class="row justify-content-center container">
            @foreach($medicines as $medicine)
            <div class="row-height">
                <div class="col-mb-4">
                    <div class="card mb50">
                        <div class="card-header"><h2 class="text-center mauto" style="font-weight:bold;">{{ $medicine->name }}</h2></div>
                            <div class="card-body" style="font-size:1.5rem;">
                                @if($medicine->image)
                                    <div class="image-wrapper"><img src="/thumbnail/{{ $medicine->image }}"></div>
                                @else
                                    <div class="image-wrapper"><img class="card-img" src="{{ asset('../images/medicine.png') }}"></div>
                                @endif
                                <ul class="list-group list-group-flush" style="flex-direction:row;"> 
                                    @if ($medicine->timezone != "")
                                    @foreach(explode(',', $medicine->timezone) as $info)
                                        <li style="list-style:none;">
                                        @if($info == '朝')
                                            <span class="badge badge-primary mr10 p10" style="font-size:1.3rem;">朝</span>
                                        @endif
                                        @if($info == '昼')
                                            <span class="badge badge-warning mr10 p10" style="font-size:1.3rem;">昼</span>
                                        @endif
                                        @if($info == '夜')
                                            <span class="badge badge-dark mr10 p10" style="font-size:1.3rem;">夜</span>
                                        @endif
                                        @if($info == '食前')
                                            <span class="badge badge-light mr10 p10" style="font-size:1.3rem;">食前</span>
                                        @endif
                                        @if($info == '食後')
                                            <span class="badge badge-secondary mr10 p10" style="font-size:1.3rem;">食後</span>
                                        @endif
                                    @endforeach
                                    @else
                                        <span class="badge badge-info mr10 p10" style="font-size:1.3rem;">指定なし</span>
                                        </li>
                                    @endif
                                </ul>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="padding-left:0px;">1回に服用する量：{{ $medicine->quantity }}</li>
                                    <li class="list-group-item" style="padding-left:0px;">服用期間：{{ $medicine->term }}</li>
                                    @if($medicine->hospital != '')
                                        <li class="list-group-item" style="padding-left:0px;">{{ $medicine->hospital }}</li>
                                    @else
                                        <li class="list-group-item" style="padding-left:0px;">病院の指定なし</li>
                                    @endif

                                    @if(empty($medicine->body))
                                        <li class="list-group-item" style="padding-left:0px;">特になし</li>
                                    @else
                                        <li class="list-group-item" style="padding-left:0px;"> 
                                            @php 
                                                $medicine->body = Str::limit($medicine->body, 17,'(...)');
                                            @endphp 
                                            {{ $medicine->body }}
                                        </li>
                                    @endif
                                </ul>

                            <a href="{{ route('show', ['id' => $medicine->id ]) }}" class="btn btn-success" style="width:100%;">詳細</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $medicines->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
@endauth
@section('footer')
@endsection