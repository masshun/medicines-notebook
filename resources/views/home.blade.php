<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('js/main.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
      <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
      <link href="{{ asset('css/icomoon/style.css') }}" rel="stylesheet">
      <style>
      .html,body{
        height: 100%;
      }

      .wrapper{
        width: 100%;
        position: relative;
        min-height: 100%;
      }
      .card{
        height:300px;
      }

      .inner{
        padding-bottom:200px;/*フッターの高さと同じにする*/
      }

      footer{
        height:200px;
        position:absolute;
        bottom:0;
      }
      .card-body{
        width: 100%;
        margin: auto;
      }
      .card-horizon-con{
    height: 200px;
    border-radius: 10px;
/*      box-shadow: 5px 10px 20px rgba(0,0,0,0.25); */
    overflow: hidden;
}

.center{
    margin: 2em auto;
}

.left > img{
    width: 100%;
    height: 100%;
}

.postdata{
    position: absolute;
    top: 0;
    left: 0;
  opacity: 0;
    background: rgba(0,0,0,0.7);
    width: 100%;
    height: 100%;
    padding: 10px;
}

.postdata:hover {
    opacity: 1;
    transition: 1.0s;
    -moz-transition: 1.0s;
    -o-transition: 1.0s;
}

.postdata > ul{
    padding: 0;
}

.postdata > ul > li{
    list-style: none;
    border-bottom: 1px solid white;
}

.postdata-sp{
    display: none;
}

.category,.author{
    position: absolute;
    background: gray;
    opacity: 0.6;
}

.category{
    top: 0;
    left: 0;
}

.author{
    bottom: 0;
    left: 0;
}

.category:hover,.author:hover{
    opacity: 1;
}

.category > p,.author > p{
    margin: 0;
}

.button-group{
    margin-right: 20px;
    position: absolute;
    bottom: 10px;
    right: 0;
}
.button-group > .btn{
    margin-left: 10px;
}

@media (max-width: 768px){
  .card{
    height: 100%;
  }
}

      </style>
  </head>
  <body>
  <div class="wrapper">
    <main class="main inner" style="background:#fff;">  
    <!--
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div id="cards">
                <div class="card-horizon">
                    <div class="row center card-horizon-con">
                        <div class="col-md-4  col-4 p-0 wh-100 bg-secondary left">
                            <img src="https://placehold.jp/200x200.jpg">
                            <div class="postdata text-white">
                                <ul>
                                    <li>投稿者:@kikiriko200</li>
                                    <li>カテゴリー:Category</li>
                                    <li>投稿日時:2018/8/21 12:00</li>
                                </ul>
                            </div>
                            <div class="postdata-sp">
                                <div class="category text-white">
                                    <p>Category</p>
                                </div>
                                <div class="author text-white">
                                    <p>@kikiriko200</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-8  p-0 wh-100 bg-secondary right">
                            <h5 class="card-title text-white">
                                Example Title
                            </h5>
                            <p class="card-text text-white">
                                あいうえおあいうえおあいうえおあいうえお[...]
                            </p>
                            <div class="button-group">
                                <button class="btn btn-danger bottom">
                                    <i class="far fa-heart"></i>2
                                </button>
                                <button class="btn btn-info bottom">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="btn btn-success">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

      <div class="container-fluid">        
        <div class="row text-center">
              <div class="col-6" style="padding-right:0px;">
                <div class="card text-white rounded-0" style="background: #0b03a6;">

                    <div class="card-body">
                    <i class="fas fa-clipboard-list card-title" style="font-size: 100px;"></i>
                      <h3 class="card-text">カードのタイトル</h3>
                    </div>
                  
                </div>
              </div>
              <div class="col-6" style="padding-left:0px;">
                <div class="card text-white rounded-0" style="background: #0b03a6;">

                    <div class="card-body">
                    <i class="fas fa-clipboard-list card-title" style="font-size: 100px;"></i>
                      <h3 class="card-text">カードのタイトル</h3>
                    </div>
                  
                </div>
              </div>
              <div class="col-6" style="padding-right:0px;">
                <div class="card bg-dark text-white rounded-0">

                <div class="card-body">
                    <i class="fas fa-clipboard-list card-title" style="font-size: 100px;"></i>
                      <h3 class="card-text">カードのタイトル</h3>
                    </div>
                  
                </div>
              </div>
              <div class="col-6" style="padding-left:0px;">
                <div class="card bg-dark text-white rounded-0">

                <div class="card-body">
                    <i class="fas fa-clipboard-list card-title" style="font-size: 100px;"></i>
                      <h3 class="card-text">カードのタイトル</h3>
                    </div>
                  
                </div>
              </div>
        </div>
      </div>
    </main>
    <footer class="hidden">
    </footer>
    </div>
  </body>
</html>