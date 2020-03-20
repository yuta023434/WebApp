<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>

  {{-- BootstrapベースCSSファイル --}}
  <link href="{{asset('public/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  {{-- ページレイアウト関連テンプレートCSSファイル --}}
  <link href="{{asset('public/css/modern-business.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

  {{-- カレンダーのCSSファイル --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
    
  {{-- 商品管理一覧 --}}
  <link href="{{asset('public/css/goods.css')}}" rel="stylesheet">

  {{-- jQueryベースライブラリ --}}
  <script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>

  {{-- カレンダーライブラリ --}}
  <script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script>
  $(function() {
      
      {{-- 日本語化 --}}
      $.datepicker.regional['ja'] = {
      closeText: '閉じる',
      prevText: '<前',
      nextText: '次>',
      currentText: '今日',
      monthNames: ['1月','2月','3月','4月','5月','6月',
      '7月','8月','9月','10月','11月','12月'],
      monthNamesShort: ['1月','2月','3月','4月','5月','6月',
      '7月','8月','9月','10月','11月','12月'],
      dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
      dayNamesShort: ['日','月','火','水','木','金','土'],
      dayNamesMin: ['日','月','火','水','木','金','土'],
      weekHeader: '週',
      dateFormat: 'yy/mm/dd',
      firstDay: 0,
      isRTL: false,
      showMonthAfterYear: true,
      yearSuffix: '年'};
    $.datepicker.setDefaults($.datepicker.regional['ja']);

    {{-- 指定したテキストボックスにカレンダー表示 --}}
    $("#s_up_date").datepicker({
      buttonImage: "{{asset('public/css/icon_calendar.png')}}",   {{-- カレンダーアイコン画像 --}}
      buttonText: "カレンダーから選択",                             {{-- ツールチップ表示文言 --}}
      buttonImageOnly: true,                                      {{-- 画像として表示 --}}
      showOn: "both"                                              {{-- カレンダー呼び出し元の定義 --}}
    });
    $("#e_up_date").datepicker({
      buttonImage: "{{asset('public/css/icon_calendar.png')}}",        
      buttonText: "カレンダーから選択", 
      buttonImageOnly: true,           
      showOn: "both"                   
    });
    $("#s_ins_date").datepicker({
      buttonImage: "{{asset('public/css/icon_calendar.png')}}",        
      buttonText: "カレンダーから選択", 
      buttonImageOnly: true,           
      showOn: "both"                   
    });
    $("#e_ins_date").datepicker({
      buttonImage: "{{asset('public/css/icon_calendar.png')}}",       
      buttonText: "カレンダーから選択", 
      buttonImageOnly: true,           
      showOn: "both"                   
    });
  });
{{-- フォームのアクションを切り替える --}}
function submitAction(value,method) 
{
  $('form').attr('action', value);
 
  if(method == 'get')
  { 
    $('form').attr("method","GET");
  }
  else if(method == 'post')
  {
    $('form').attr("method","POST");
  }

  $('form').submit();
}
  </script>
<style>
{{-- コンテナのスタイル --}}
html {
  height: 100%;
}
body {
  min-height: 100%;
  display: flex;
  flex-direction: column;
}
 .container{
  /* position:relative !important;
  height:88% !important; */
  flex:1;
} 
{{-- フッターのスタイル --}}
/* footer{
  position:fixed !important; 
  width:100% !important;
  height:120px !important;
} */

</style>
{{-- カレンダーアイコンのスタイル --}}
<style>
img.ui-datepicker-trigger{
  cursor: pointer;
  margin-left: 5px!important;
  margin-right: 5px!important;
  vertical-align: middle;
}
</style>
</head>

<body>

 {{-- ナビゲーション --}}
 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">商品管理システム</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/laravel/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/laravel/services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/laravel/contact">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Portfolio
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
              <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
              <a class="dropdown-item" href="blog-post.html">Blog Post</a>
            </div>
          </li>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Other Pages
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="full-width.html">Full Width Page</a>
              <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
              <a class="dropdown-item" href="faq.html">FAQ</a>
              <a class="dropdown-item active" href="404.html">404</a>
              <a class="dropdown-item" href="pricing.html">Pricing Table</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@yield('content')

  {{--　フッター --}}
  <footer class="py-3 bg-dark absolute-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>
</body>

</html>
