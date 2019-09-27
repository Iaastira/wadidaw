@extends('layouts.frontend')

@section('title-website')
    Blog
@endsection

@section('title')
    Blog Page
@endsection

@section('content')
<!-- container 12 -->

<style>
    p.serif {
    font-family: "Times New Roman", Times, serif;
    font-size: 17px;
    }
</style>

<div class="container_12">
    <!-- a sidebar width blog post -->
    <div class="content left grid_9">
    
        <!-- a blog post -->
        @foreach($article as $data)
        <div class="a_blogpost">
            <!-- post image -->
            <div class="grid_4 alpha">
                <div class="image">
                    <div class="normal">
                        <img src="{{ asset('assets/img/article/'.$data->foto)}}" alt="" class="grid_image" />
                    </div>
                </div>
            </div>
            <!-- post image end -->
            <div class="grid_5 omega">
                <h6 class="mb_heading"><a href="{{ route('detail.blog', $data->slug) }}">{{ $data->judul }}</a></h6>
            <!-- post meta info -->
                <div class="meta-info">
                    <div class="date-info">{{ date('d F Y' ,strtotime($data->created_at)) }}</div>
                </div>
            <!-- post meta info end -->
            <!-- post content -->
                <div class="post-content">
                <p>
                    {!! substr($data->konten, 0, 200) !!} ....
                </p>
                <a href="{{ route('detail.blog', $data->slug) }}" class="sc_button medium">Read More</a>
                </div>
            <!-- post content end -->
            </div>
        </div>
        <!-- a blog post end -->
      
        <!-- page navigation -->
        <ul class="page_navigation">
           
        </ul>
        <!-- page navigation end -->
        @endforeach
               <p class="serif">Page : {{ $article->currentPage() }}</p>
               <p class="serif">the Amount of Data : {{ $article->total() }}</p>
               <p class="serif">Data Per Page : {{ $article->perPage() }}</p>
        <br><br>
         
        <div class="grid_12">
            <ul class="page_navigation">
                <!-- page navigation -->
                {{ $article->links('pagination.default') }}
                <!-- page navigation end -->
            </ul>
        </div>

    </div>
    @include('layouts.partial-frontend.sidebar')
</div>



<!-- container 12 end -->
<div class="clearfix"></div>
@endsection