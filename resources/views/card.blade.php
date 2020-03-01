@extends('layouts.app')
@section('css')
<style>
.box1{
    background-color:#fff;
   
}
.box11{
    background-color:#fff;
}
.box2{
    background-color:darkkhaki;
    

}
.box3{
    background-color:#000000;
    
}
.box4{
    background-color:#000000;
}
.box5{
    background-color:darkkhaki;
}

</style>
@endsection
@section('content')
@auth
<div class="container" style="">
  <div class="row shadow text-center" style="margin-bottom:1%;">
    <div class="col-1 box5">
        <input type="checkbox" >  
    </div>
    <div class="col-1 box1 ">
        画像
    </div>
    <div class="col-4 box5">
        お薬の名前
    </div>
    <div class="col-3 box4" style="color:#00bbff;">
        1日に服用するタイミング
    </div>
    <div class="col-2 box1" style="color:#00bbff;">
        1回に服用する量
    </div>
    <div class="col-1 box4" style="color:#00bbff;">
        詳細
    </div>
  </div>

  <div class="row shadow text-center" style="margin-bottom:1%;">
    <div class="col-1 box2">
        <input type="checkbox" class="" style="">  
    </div>
    <div class="col-1 box11" style="padding:initial;">
        <!--<img class="img-wrapper img-fluid" src="{{ asset('../images/medicine1.png') }}" style="">-->
    </div>
    <div class="col-5 box2">
      可変幅コンテンツ
    </div>
    <div class="col-2 box3" style="color:#fff;">
      3つの列の3列目
    </div>
    <div class="col-2 box1" style="color:#fff;">
      詳細
    </div>
    <div class="col-1 box3" style="color:#fff;">
      aaaa
    </div>
  </div>

  <div class="row shadow" style="margin-bottom:1%;">
    <div class="col-1 box2">
        <input type="checkbox" >  
    </div>
    <div class="col-1 box1">
        <img class="img-fluid" src="{{ asset('../images/medicine1.png') }}" style="padding:2px;">
    </div>
    <div class="col-5 box2">
      可変幅コンテンツ
    </div>
    <div class="col-2 box3" style="color:#fff;">
      3つの列の3列目
    </div>
    <div class="col-2 box1" style="color:#fff;">
      詳細
    </div>
    <div class="col-1 box3" style="color:#fff;">
      aaaa
    </div>
  </div>

</div>

@endauth
@endsection
@section('footer')
@endsection