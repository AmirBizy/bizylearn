{{-- @extends('errors::minimal') --}}

{{-- @section('title', __('صفحه مورد نظر پیدا نشد'))
@section('code', '404')
@section('message', __('صفحه مورد نظر پیدا نشد')) --}}

<head>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
</head>

<style>
    body {
        background: #363636
    }
</style>

<svg id="custom_404_svg" width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
    </g>
</svg>
<div class="message-box">
  <h1>404</h1>
  <p>صفحه مورد نظر پیدا نشد</p>
  <div class="buttons-con">
    <div class="action-link-wrap">
      <a onclick="history.back(-1)" class="link-button link-back-button">بازگشت به صفحه قبلی</a>
      @if (request()->is('admin/*'))
      <a href="{{ route('admin.admin_index') }}" class="link-button">صفحه اصلی</a>
      @else
      <a href="{{ route('home.index') }}" class="link-button">صفحه اصلی</a>
      @endif
    </div>
  </div>
</div>
