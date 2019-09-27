 <!-- a sidebar width blog post end -->
    
    <!-- sidebar right -->
    @php
        $category = \App\Category::all();
    @endphp
    <div class="sidebar right grid_3">
        <div class="widget">
            <div class="divider_page"><h4>Categories</h4></div>
            <ul class="sidebar_cat">
                @foreach($category as $data)
                        @if($data->Article->count() > 0)
                <li><a href="/blog/category/{{ $data->slug }}" class="text-primary"><b>{{ $data->nama }}</b></a></li>
                        @endif
                @endforeach
            </ul>
        </div>
        <div class="widget">
            <div class="divider_page"><h4>Latest Post</h4></div>
            <div class="sidebar_tweets">
            @php
                $recent = \App\Article::latest()->paginate(4);
            @endphp
                @foreach($recent as $data)
                        <img class="img" style="width:150px;" src="{{ asset('assets/img/article/'.$data->foto) }}" alt="">
                    <div class="recent-details">
                        <a href="/blog/{{ $data->slug }}">
                            <h6>
                                {{ $data->judul }}
                            </h6>
                        </a>
                        <p>
                            {{ $data->created_at->diffForHumans() }}
                        </p><hr>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="widget">
            <div class="divider_page"><h4>Tags</h4></div>
            <div class="sidebar_flickr">
            @php
                $tag = \App\Tag::all();
            @endphp
            <div class="sidebar-box">
                <ul class="tags">
                    @foreach($tag as $data)
                        @if($data->Article->count() > 0)
                    <li><a href="/blog/tag/{{ $data->slug }}">{{ $data->nama }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    </div>
    <!-- sidebar right end -->