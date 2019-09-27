@extends('layouts.frontend')

@section('title-website')
    Services
@endsection

@section('title')
    Services Page
@endsection

@section('content')
<!-- container 12 -->
<div class="container_12">
    <!-- mission and vision -->
    <div class="grid_6">
        <!-- page slider -->
        <div class="sliderinPage theme-dark">
            <div class="nivoSlider">
                <img src="{{ asset('development1.jpg')}}" alt="" />
                <img src="{{ asset('development2.png')}}" alt="" />
                <img src="{{ asset('development3.jpg')}}" alt="" />
            </div>
        </div>
        <!-- page slider end -->
    </div>
    <div class="grid_6">
        <div class="divider_page"><h2>01. Software Development</h2></div>
        <p style="font-size:15px">Software development is our core business, both developing existing programs or starting from scratch. From Desktop App, Web Based Application or Mobile Application. You named IT.</p>
        <p style="font-size:15px">We define the needs of end-users, design the software using a variety of standard methodologies or using documents from your company. We then execute the plan with our team of programmers who have expertise with a wide variety of information system.</p>
    </div>
    <!-- mission and vision end -->
</div>

<div class="container_12">
    <div class="grid_12">
        <div class="divider_page">
            <h2>02. System Integrator</h2>
        </div>
        <p style="font-size:18px">Need solutions ASAP ? We can help you with using existing bundled app or CMS that will meet your requirement.</p>
    </div>
</div><br><br>
<!-- container 12 end -->
<!-- container 12 -->
<div class="container_12">
    <!-- features boxes -->
    <div class="grid_12">
        @foreach($services as $data)
        <div class="grid_3 alpha">
            <!-- a feature box -->
            <div class="feature_box">
                <div class="feature_icon">
                    <img src="{{ asset('assets/img/service/'.$data->image)}}" width="35px" height="35px" alt="">
                </div>
                <div class="feature_content">
                    <div class="feature_heading">
                        <div class="small" style="font-size:22px;">{{$data->title}}</div>
                    </div>
                    <div class="desc" style="font-size:15px; text-align:center; font-color:white;">{{$data->desc}}</div>
                </div>
            </div>
            <!-- a feature box end -->
        </div>
        @endforeach
    </div>
    <!-- features boxes end -->
</div>
<!-- container 12 end -->
<!-- container 12 -->
<div class="container_12">
    <!-- other services -->
    <div class="grid_12">
        <div class="divider_page"><h2>03. IT Resources & Training</h2></div>
        <p style="font-size:15px">We have adopted the basic principle of providing win-win solutions to benefit both our clients and IT workers by providing Human Resource in IT field at an Affordable Price.</p>
        <ul>
            <li>Developing Web Based Enterprise Applications ASP .NET MVC</li>
            <li>Understanding Database Management System Miscrosoft SQL Server</li>
            <li>Developing Web-Based Applications Using PHP (PHP: Hypertext Preprocessor)</li>
            <li>Developing Mobile Applications (Android SDK)</li>
        </ul>       
    </div>
</div>
<!-- container 12 end -->
<br><br><br>
@endsection