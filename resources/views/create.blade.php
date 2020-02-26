@extends('layouts.app')

@section('content')
<div class="row justify-content-center container">
    <div class="col-md-10">
      <form method='POST' action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
        <div class="card-header"><h4 class="mauto" style="text-align:center;">お薬登録ページ</h4></div>
            <div class="card-body">

              <div class="form-group">
                <label>お薬の名前<span style="color:#F00;">　※必須項目</span></label>
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
                <label>処方された病院名</label>
                <input type='text' class="form-control" name='hospital' placeholder='病院名を入力'>
              </div>

              <div class="form-group">
                <label>服用するタイミング<span style="color:#F00;"></span></label>
                <div  style="font-size:1.1rem;">
                  <label class=""><input type='checkbox' name='timezone[]' value='朝'><span class="pl10">朝</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='昼'><span class="pl10">昼</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='夜'><span class="pl10">夜</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='食前'><span class="pl10">食前</span></label>
                  <label class="ml20"><input type='checkbox' name='timezone[]' value='食後'><span class="pl10">食後</span></label>
                </div>
              </div>

              <div class="form-group">
                <label>特記事項</label>
                <textarea class='description form-control' name='body' placeholder='本文を入力'></textarea>
              </div>

              <div class="form-group">
                <label for="file1">お薬の写真</label>
                <input type="file" id="file1" name='image' class="form-control-file">
              </div>

              <input type='submit' class='btn btn-primary' value='お薬を登録'>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection