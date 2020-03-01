@extends('layouts.app')

@section('css')
@endsection
@section('content')
@auth
<body>
<main>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="..." class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">カードのタイトル</h5>
        <p class="card-text">...</p>
        <p class="card-text"><small class="text-muted">最終更新3分前</small></p>
      </div>
    </div>
  </div>
</div>
</main>
</body>
@endauth
@endsection
@section('footer')
@endsection
