<!-- ini footer -->
<div id="footer">
    <div class="back_top"></div>
    <!-- footer container -->
        <div class="container_12 footer_content">
        <div class="grid_3">
            <h3><span class="first-word">About</span></h3>
            <p>We are IT Solutions company from Bandung, Indonesia. We design, create, and develop a variety of software and in all matters relating to the application of Information and Communication Technology.</p>
        </div>
        <div class="grid_3">
            <h3><span class="first-word">Recent Posts</span></h3>
            @php
                $recent = \App\Article::latest()->paginate(3);
            @endphp
            @foreach($recent as $data)
            <div class="recent_posts">
                <div class="a_post">
                    <a href="/blog/{{ $data->slug }}" title="{{ $data->judul }}" class="post_img">
                        <img src="{{ asset('assets/img/article/'.$data->foto) }}" alt="Recent Post" height="50px" />
                    </a>
                    <h6 class="post_heading"><a href="/blog/{{ $data->slug }}">{{ $data->judul }}</a></h6>
                    <div class="post_meta"><span class="time">{{ $data->created_at->diffForHumans() }}</span></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="grid_3">
            <h3><span class="first-word">Contact</span></h3>
            <p><b>Address:</b><br>Jl. Guntursari Wetan No. 17 Buah Batu, Bandung Jawa Barat, Indonesia 40286<br><b>Telephone :</b><br>(022)87325528<br><b>Telephone 2:</b><br>(0267)8406552<br><b>Email :<br>info[at]arkamaya.co.id<br></b></p>
        </div>
        <div class="grid_3">
            <h3><span class="first-word">Gallery</span> Stream</h3>
            @php
                $gallery = \App\Gallery::latest()->take(9)->get();
            @endphp
              @foreach($gallery as $data)
            <a href="{{ asset('assets/img/gallery/'.$data->image)}}" data-rel="prettyPhoto" >
            <img src="{{ asset('assets/img/gallery/'.$data->image)}}" height="70px" width="70px" alt="">
            </a>
              @endforeach
        </div>
    </div>
    <!-- footer container end -->
    <div class="clearfix"></div>
    <!-- footer bottom -->
    <div class="footer_bottom">
        <div class="container_12">
            <div class="grid_6">
                <div class="footer_text">Copyright  2019 &copy;, Created by <a href="http://arkamaya.co.id" target="_blank">Arkamaya</a></div>
            </div>
        </div>
    </div>
<!-- footer bottom end -->
</div>