@extends('layouts.app')

@section('content')
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif
<div class="row justify-content-center container">
    <div class="col-md-10">
      <form method='POST' action="{{ route('update',['id' => $medicine->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card">
        <div class="card-header"><h4 class="mauto" style="text-align:center;">お薬更新ページ</h4></div>
            <div class="card-body">
              <div class="form-group">
                <label>お薬の名前<span style="color:#F00;">　※必須項目</span></label>
                <input type='text' class='form-control' name='name' value="{{ old('name', $medicine->name) }}">
              </div>

              <div class="form-group">
                <label>1回あたり服用する量<span style="color:#F00;"></span></label>
                <input type='text' class="form-control" name='quantity' value="{{ old('quantity', $medicine->quantity) }}">
              </div>

              <div class="form-group">
                <label>処方期間</label>
                <input type='text' class="form-control" name='term' value="{{ old('term', $medicine->term) }}">
              </div>

              <div class="form-group">
                <label>処方された病院</label>
                <input type='text' class="form-control" name='hospital' value="{{ old('hospital', $medicine->hospital) }}">
              </div>

              <div class="form-group">
                <label>服用開始日</label>
                <input type='date' class="form-control" name='day' style='width:50%;' value='{{ old('day', $medicine->day) }}'>
              </div>

              <div class="form-group">
                <label>服用するタイミング</label>
                <div  style="font-size:1.1em;">
                  <label class="ml20"><input type='radio' name='timing' value='食前' {{ old('timing', $medicine->timing) == '食前' ? 'checked' : ''}}><span class="pl10">食前</span></label>
                  <label class="ml20"><input type='radio' name='timing' value='食後' {{ old('timing', $medicine->timing) == '食後' ? 'checked' : ''}}><span class="pl10">食後</span></label>
                  <label class="ml20"><input type='radio' name='timing' value='適宜' {{ old('timing', $medicine->timing) == '適宜' ? 'checked' : ''}}><span class="pl10">適宜</span></label>
                </div>
              </div>

              <div class="form-group">
                <label>服用する時間帯</label>
                <div  style="font-size:1.1em;">
                
                @php
                $info = explode(',', $medicine->timezone);
                @endphp
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='朝' @if(is_array(old('timezone', $info)) && in_array("朝", old('timezone', $info ))) checked @endif><span class="pl10">朝</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='昼' @if(is_array(old('timezone', $info)) && in_array("昼", old('timezone', $info))) checked @endif><span class="pl10">昼</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='夜' @if(is_array(old('timezone', $info)) && in_array("夜", old('timezone', $info))) checked @endif><span class="pl10">夜</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='起床時' @if(is_array(old('timezone', $info)) && in_array("起床時", old('timezone', $info))) checked @endif><span class="pl10">起床時</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='就寝前' @if(is_array(old('timezone', $info)) && in_array("就寝前", old('timezone', $info))) checked @endif><span class="pl10">就寝前</span></label>
                </div>
              </div>

              <div class="form-group">
              <label>特記事項</label>
                <textarea class='description form-control' name='body'>{{ old('body', $medicine->body) }}</textarea>
              </div>

              <div class="form-group">
                <label for="file1">お薬の写真　<span style="color:red; font-size:0.7em;">※サイズは1000×1000まで。画像ファイルのみ対応可</span></label>
                <input type="file" id="file1" name='image' class="form-control-file">
              </div>

              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">過去に服用/服用中</label>
              </div>
              <input type="hidden" name="_method" value="patch">
              <input type='submit' class='btn btn-primary mt20' value='お薬を更新'>
              <a href="{{ url('/') }}" class="btn btn-secondary mt20 ml10">戻る</a>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection