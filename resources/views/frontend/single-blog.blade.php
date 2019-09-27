@extends('layouts.frontend')

@section('title-website')
    {{ $article->judul }}
@endsection

@section('title')
    {{ $article->judul }}
@endsection

@section('content')
<!-- container 12 -->
<div class="container_12">
    <!-- blog post container -->
    <div class="content left grid_9">
        <!-- a blog post -->
        <div class="a_blogpost">
            <div class="divider_page"><h2> {{ $article->judul }}</h2></div>
            <!-- post meta info -->
            <div class="meta-info">
                <div class="user-info"><a href="#" title="Posts by admin"> {{ $article->user->name }}</a></div>
                <div class="date-info">{{ $article->created_at->diffForHumans() }}</div>
            </div>
            <!-- post meta info end -->
            <!-- post slider -->
            <div class="blogSlider theme-dark">
                <div class="nivoSlider">
                    <img src="{{ asset('assets/img/article/'.$article->foto)}}" alt="" />
                </div>
            </div>
            <!-- post slider end -->
            <!-- post content -->
            <div class="post-content">
            <p>{!! $article->konten !!}</p>
            </div>
            <br><br><br><br>
            <div class="bottom-meta">
                <div class="user-details row align-items-center">
                    <div class="comment-wrap col-lg-6">
                        <script data-sil-id="5d2d6c5baea7930010e1c912">let loadWidget = function() { var d = document, w = window, l = window.location,p = l.protocol == "file:" ? "http://" : "//"; if (!w.WS) w.WS = {}; c = w.WS; var m=function(t, o){ var e = d.getElementsByTagName("script"); e=e[e.length-1]; var n = d.createElement(t); if (t=="script") {n.async=true;} for (k in o) n[k] = o[k]; e.parentNode.insertBefore(n, e)}; m("script", { src: p + "bawkbox.com/widget/like-dislike/5d2d6c5baea7930010e1c912?page=" +encodeURIComponent(l+''), type: 'text/javascript' }); c.load_net = m; }; if(window.Squarespace){ document.addEventListener('DOMContentLoaded', loadWidget); } else { loadWidget() } </script><div class="sil-widget-like-dislike sil-widget" id="sil-widget-5d2d6c5baea7930010e1c912"><a href="//bawkbox.com/install/like-dislike">Like Dislike Button</a></div><!-- End BawkBox Code-->
                    </div>
                </div>
            </div>
            <!-- post content end -->
            <!-- comment form end -->  
        </div>
        <!-- a blog post end -->
    </div>
    <!-- blog post container end -->
    
    @include('layouts.partial-frontend.sidebar')
</div>
<!-- container 12 end -->
<div class="clearfix"></div>
@endsection