@extends('layouts.frontend')

@section('title-website')
    About Us
@endsection

@section('title')
    About Us Page
@endsection

@section('content')
<!-- container 12 -->
<div class="container_12">
    <!-- mission and vision -->
    @php
        $about = \App\About::paginate(4);
    @endphp
    @foreach($about as $data)
    <div class="grid_6">
        <div class="divider_page"><h2>{{$data->title}}</h2></div>
       <p style="font-size:15px">{{$data->desc}}</p>
    </div>
    @endforeach
    <!-- mission and vision end -->
</div>
<!-- container 12 end -->
<!-- container 12 -->
<div class="container_12">
    <!-- tabs -->
    <div class="grid_6">
        <div class="divider_page"><h2>Position Available</h2></div>
        <!-- accordion -->
        <div class="accordion">
            <h5>PHP Developer</h5>
            <div>
                <p>Responsibilities</p>
                <ul>
                    <li>Integration of user-facing elements developed by front-end developers</li>
                    <li>Build efficient, testable, and reusable PHP modules</li>
                    <li>Solve complex performance problems and architectural challenges</li>
                    <li>Integration of data storage solutions (may include databases, key-value stores, blob stores, etc.)</li>
                </ul>
                <p>Skill and Qualifications</p>
                <ul>
                    <li>Strong knowledge of PHP web frameworks (such as Laravel, Codeigniter, Yii)</li>
                    <li>Understanding the fully synchronous behavior of PHP</li>
                    <li>Understanding of MVC design patterns</li>
                    <li>Basic understanding of front-end technologies, such as JavaScript, HTML5, and CSS3</li>
                    <li>Knowledge of object oriented PHP programming</li>
                    <li>Understanding accessibility and security compliance</li>
                    <li>Strong knowledge of the common PHP or web server exploits and their solutions</li>
                    <li>Understanding fundamental design principles behind a scalable application</li>
                    <li>User authentication and authorization between multiple systems, servers, and environments</li>
                    <li>Integration of multiple data sources and databases into one system</li>
                    <li>Familiarity with limitations of PHP as a platform and its workarounds</li>
                    <li>Creating database schemas that represent and support business processes</li>
                    <li>Familiarity with SQL/NoSQL databases and their declarative query languages</li>
                    <li>Proficient understanding of code versioning tools, such as Git,SVN</li>
                </ul>
            </div>
            <h5>ASP.NET C# Developer</h5>
            <div>
                <p>Responsibilities</p>
                <ul>
                    <li>Translate application storyboards and use cases into functional applications</li>
                    <li>Design, build, and maintain efficient, reusable, and reliable code</li>
                    <li>Integrate data storage solutions (may include databases, key-value stores, blob stores, etc.)</li>
                    <li>Ensure the best possible performance, quality, and responsiveness of applications</li>
                    <li>Identify bottlenecks and bugs, and devise solutions to mitigate and address these issues</li>
                    <li>Help maintain code quality, organization, and automatization</li>
                </ul>
                <p>Skills</p>
                <ul>
                    <li>Strong knowledge of .NET web framework</li>
                    <li>Proficient in C#, with a good knowledge of their ecosystems</li>
                    <li>Familiarity with the MVC framework</li>
                    <li>Strong understanding of object-oriented programming</li>
                    <li>Skill for writing reusable libraries</li>
                    <li>Familiar with various design and architectural patterns</li>
                    <li>Knowledge of concurrency patterns</li>
                    <li>Familiarity with Microsoft SQL Server</li>
                    <li>Experience with popular web application frameworks</li>
                    <li>Knack for writing clean, readable, and easily maintainable code</li>
                    <li>Understanding of fundamental design principles for building a scalable application</li>
                    <li>Experience creating database schemas that represent and support business processes</li>
                    <li>Experience implementing automated testing platforms and unit tests</li>
                    <li>Proficient understanding of code versioning tools (such as Git, SVN, and Mercurial)</li>
                </ul>
            </div>
        </div>
        <!-- accordion end -->
    </div>
    <!-- tabs end -->
    <!-- progress bar -->
    <div class="grid_6">
        <div class="divider_page"><h2>We offer the following technology platforms :</h2></div>
        <div class="progress_bars">
            <b>ASP.NET</b>
            <div class="progress_bar" data-percentage="95" data-title="95%"><span></span></div>
            <b>PHP</b>
            <div class="progress_bar" data-percentage="95" data-title="95%"><span></span></div>
            <b>MOBILE APPS (ANDROID)</b>
            <div class="progress_bar" data-percentage="90" data-title="90%"><span></span></div>
            <b>DATABASE, INTERFACING, OTHERS</b>
            <div class="progress_bar" data-percentage="95" data-title="95%"><span></span></div>
        </div>
    </div>
    <!-- progress bar end -->
</div>
<!-- container 12 end -->
<!-- container 12 -->
<div class="container_12">
    <!-- our team members -->
    <!-- team navi -->
    <div class="grid_12">
        <div class="divider_page">
            <h2>Our Team</h2>
            <div class="heading_button">
                <div class="prev_button" id="teammembers_prev">Prev</div>
                <div class="next_button" id="teammembers_next">Next</div>
            </div>
        </div>
    </div>
    <!-- team navi end -->
    <!-- our team members -->
    <div class="team_members">
        <!-- a member -->
        <div class="a_member">
            <!-- member pic -->
            <div class="member_pic">
                <img src="team-99.jpg" alt="member1">
            </div>
            <!-- member pic end -->
            <!-- member content -->
            <div class="member_content">
                <!-- member info -->
                <div class="member_info">
                    <div class="member_name">Irfan Satriadarma</div>
                    <div class="member_job">Chief Executive Officer</div>
                </div>
                <!-- member info end -->
                <!-- member social networks end -->
                <div class="clearfix"></div>
            </div>
            <!-- member content end -->
        </div>
        <!-- a member end -->
        <!-- a member -->
        <div class="a_member">
            <!-- member pic -->
            <div class="member_pic">
                <img src="team-98.jpg" alt="member2">
            </div>
            <!-- member pic end -->
            <!-- member content -->
            <div class="member_content">
                <!-- member info -->
                <div class="member_info">
                    <div class="member_name">Achmad Nur Pratomo</div>
                    <div class="member_job">Chief Technology Officer</div>
                </div>
                <!-- member info end -->
                <div class="clearfix"></div>
            </div>
            <!-- member content end -->
        </div>
        <!-- a member end -->
        <!-- a member -->
        <div class="a_member">
            <!-- member pic -->
            <div class="member_pic">
                <img src="team-97.jpg" alt="member3">
            </div>
            <!-- member pic end -->
            <!-- member content -->
            <div class="member_content">
                <!-- member info -->
                <div class="member_info">
                    <div class="member_name">Farid Satia Supriana</div>
                    <div class="member_job">Chief Operating Officer</div>
                </div>
                <!-- member info end -->
                <div class="clearfix"></div>
            </div>
            <!-- member content end -->
        </div>
        <!-- a member end -->
        <!-- a member -->
        <div class="a_member">
            <!-- member pic -->
            <div class="member_pic">
                <img src="team-96.jpg" alt="member4">
            </div>
            <!-- member pic end -->
            <!-- member content -->
            <div class="member_content">
                <!-- member info -->
                <div class="member_info">
                    <div class="member_name">Ipan Herdiansyah</div>
                    <div class="member_job">Chief Marketing Officer</div>
                </div>
                <!-- member info end -->
                <div class="clearfix"></div>
            </div>
            <!-- member content end -->
        </div>
        <!-- a member end -->
        <!-- a member -->
        <div class="a_member">
            <!-- member pic -->
            <div class="member_pic">
                <img src="team-95.jpg" alt="member5">
            </div>
            <!-- member pic end -->
            <!-- member content -->
            <div class="member_content">
                <!-- member info -->
                <div class="member_info">
                    <div class="member_name">Widya Revina</div>
                    <div class="member_job">HRGA Manager</div>
                </div>
                <!-- member info end -->
                <div class="clearfix"></div>
            </div>
            <!-- member content end -->
        </div>
        <!-- a member end -->
        <!-- a member -->
        <div class="a_member">
            <!-- member pic -->
            <div class="member_pic">
                <img src="team-94.jpg" alt="member6">
            </div>
            <!-- member pic end -->
            <!-- member content -->
            <div class="member_content">
                <!-- member info -->
                <div class="member_info">
                    <div class="member_name">Yudha Ari Istiantoro</div>
                    <div class="member_job">Project Manager</div>
                </div>
                <!-- member info end -->
                <div class="clearfix"></div>
            </div>
            <!-- member content end -->
        </div>
        <!-- a member end -->
          <!-- a member -->
          <div class="a_member">
            <!-- member pic -->
            <div class="member_pic">
                <img src="team-93.jpg" alt="member6">
            </div>
            <!-- member pic end -->
            <!-- member content -->
            <div class="member_content">
                <!-- member info -->
                <div class="member_info">
                    <div class="member_name">Rakhman Mansyur</div>
                    <div class="member_job">Project Manager</div>
                </div>
                <!-- member info end -->
                <div class="clearfix"></div>
            </div>
            <!-- member content end -->
        </div>
        <!-- a member end -->
    </div>
    <!-- our team members end -->
</div>
<!-- container 12 end -->
<!-- container 12 -->
<div class="container_12">
</div>
<!-- container 12 end -->
@endsection