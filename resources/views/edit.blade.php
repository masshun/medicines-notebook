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
        <div class="card-header"><h4 class="mauto" style="text-align:center;">お薬登録ページ</h4></div>
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
                <label>処方された病院名</label>
                <input type='text' class="form-control" name='hospital' value="{{ old('hospital', $medicine->hospital) }}">
              </div>

              <div class="form-group">
                <label>服用するタイミング</label>
                <div>
                <label class="ml10"><input type='checkbox' name='timezone[]' value='朝'>朝</label>
                <label class="ml10"><input type='checkbox' name='timezone[]' value='昼'>昼</label>
                <label class="ml10"><input type='checkbox' name='timezone[]' value='夜'>夜</label>
                <label class="ml10"><input type='checkbox' name='timezone[]' value='食前'>食前</label>
                <label class="ml10"><input type='checkbox' name='timezone[]' value='食後'>食後</label>
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

              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">過去に服用/服用中</label>
              </div>
              <input type="hidden" name="_method" value="patch">
              <input type='submit' class='btn btn-primary mt20' value='お薬を更新'>
              <!--<button><a href="#">更新せず戻る</a></button>-->
            </div>
        </div>
      </form>
    </div>
</div>
@endsection