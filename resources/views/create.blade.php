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
      <form method='POST' action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
        <div class="card-header"><h4 class="mauto" style="text-align:center;">お薬登録ページ</h4></div>
            <div class="card-body">

              <div class="form-group">
                <label>お薬の名前<span style="color:red; font-size:0.7em;">　※必須項目</span></label>
                <input type='text' class='form-control' name='name' placeholder='薬品名を入力'>
              </div>

              <div class="form-group">
                <label>1回あたり服用する量</label>
                <input type='text' class="form-control" name='quantity' placeholder='例：1錠'>
              </div>

              <div class="form-group">
                <label>処方期間</label>
                <input type='text' class="form-control" name='term' placeholder='例：30日分'>
              </div>

              <div class="form-group">
                <label>処方された病院</label>
                <input type='text' class="form-control" name='hospital' placeholder='病院名を入力'>
              </div>

              <div class="form-group">
                <label>服用開始日</label>
                <input type='date' class="form-control" name='day' style='width:50%;'>
              </div>

              <div class="form-group">
                <label>服用するタイミング</label>
                <div  style="font-size:1.1em;">
                  <label class="ml20"><input type='radio' name='timing' value='食前'><span class="pl10">食前</span></label>
                  <label class="ml20"><input type='radio' name='timing' value='食後'><span class="pl10">食後</span></label>
                  <label class="ml20"><input type='radio' name='timing' value='適宜'  {{ old('timing','適宜') == '適宜' ? 'checked' : '' }}><span class="pl10">適宜</span></label>
                </div>
              </div>

              <div class="form-group">
                <label>服用する時間帯</label>
                <div  style="font-size:1.1em;">
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='朝'><span class="pl10">朝</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='昼'><span class="pl10">昼</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='夜'><span class="pl10">夜</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='起床時'><span class="pl10">起床時</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='就寝前'><span class="pl10">就寝前</span></label>
                </div>
              </div>

              <div class="form-group">
                <label>特記事項</label>
                <textarea class='description form-control' name='body' placeholder='本文を入力'></textarea>
              </div>

              <div class="form-group">
                <label for="file1">お薬の写真　<span style="color:red; font-size:0.7em;">※サイズは1000×1000まで。画像ファイルのみ対応可</span></label>
                <input type="file" id="file1" name='image' class="form-control-file">
              </div>

              <input type='submit' class='btn btn-primary' value='お薬を登録'>
              <a href="{{ url('/') }}" class="btn btn-secondary ml10">戻る</a>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection