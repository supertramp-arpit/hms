@extends('layouts.main2')
@section('main-container')
    <!-- END======================== HEADER ==========================-->
    </div>
    <div class="main">
        <div class="head_panel">
            <div style="background-image: url('{{ asset('assets/images/page-head-4.jpg') }}')" class="full_width_photo transparent_film">
                <div class="container">
                    <div class="caption">
                        <h1>BLOG</h1><span>News from our Xenia family, in a different layout</span>
                    </div>
                </div>
            </div>
        </div>
        <section class="light_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">HOME</a></li>
                            <li><span>BLOG</span></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="post-grid border-right masonry boxed_child">
                            <article class="post">
                                <figure><a href="{{ url('single') }}" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-classic-2.jpg') }}"></a>
                                    <div class="blog_bg_light"><span class="post_date">October 22, 2015</span>
                                        <h2 class="post_title"><a href="{{ url('single') }}">King suite reconstruction</a></h2>
                                        <div class="post_figure_and_info">
                                            <div class="post_sub"><a href="#"><span class="post_info post_author">Henrik Pleth</span></a><a href="#22"><span class="post_info post_categories">Suites</span></a><a href="#"><span class="post_info post_comment"><i class="fa fa-comment"></i>12  </span></a></div>
                                        </div>
                                        <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that the pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="{{ url('single') }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </figure>
                            </article>
                            <hr>
                            <article class="post">
                                <figure><a href="{{ url('single') }}" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-classic-1.jpg') }}"></a>
                                    <div class="blog_bg_light"><span class="post_date">October 15, 2015</span>
                                        <h2 class="post_title"><a href="{{ url('single') }}">Rooms with pool view!</a></h2>
                                        <div class="post_figure_and_info">
                                            <div class="post_sub"><a href="#"><span class="post_info post_author">Lurch Schpellchek</span></a><a href="#22"><span class="post_info post_categories">News</span></a><a href="#"><span class="post_info post_comment"><i class="fa fa-comment"></i>12  </span></a></div>
                                        </div>
                                        <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that the pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="{{ url('single') }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </figure>
                            </article>
                            <hr>
                            <article class="post">
                                <figure><a href="{{ url('single') }}" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-classic-3.jpg') }}"></a>
                                    <div class="blog_bg_light"><span class="post_date">October 9, 2015</span>
                                        <h2 class="post_title"><a href="{{ url('single') }}">Quality services</a></h2>
                                        <div class "post_figure_and_info">
                                            <div class="post_sub"><a href="#"><span class="post_info post_author">Parsley Montana</span></a><a href="#22"><span class="post_info post_categories">Stories</span></a><a href="#"><span class="post_info post_comment"><i class="fa fa-comment"></i>12  </span></a></div>
                                        </div>
                                        <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that the pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="{{ url('single') }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </figure>
                                <hr>
                            </article>
                        </div>
                        <div class="col-md-12 text-center">
                            <ul class="pagination">
                                <li class="disabled"><a href="#">&#x2190;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&#x2192;</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- =========================== SIDEBAR ==========================-->
                        <aside class="widget widget_search small_screen_margin_top_half">
                            <form id="s" method="get" name="s" action="#">
                                <div class="input-group">
                                    <input id="search" name="s" type="text" placeholder="SEARCH" class="form-control"><i class="icon icon-Search"></i>
                                </div>
                            </form>
                        </aside>
                        <aside class="widget widget_text">
                            <h4>ABOUT XENIA</h4>
                            <div class="textwidget text-justify">   Either you look for a luxurious experience or a remarkable on the go experience, Xenia Resort is the place to visit and spend the time at. We offer quality services.</div>
                            <div class="text_block">
                                <div><i class="icon icon-Phone"></i>255 - 5546 989</div>
                                <div><i class="icon icon-Flag"></i>Mercury Hills 40, Atlanta</div>
                                <div><i class="icon icon-Keyboard"></i>support@xenia.com</div>
                            </div>
                        </aside>
                        <aside class="widget widget_latest_posts">
                            <h4>RECENT POSTS</h4>
                            <div class="media">
                                <div class="media-left media-middle pull-left"><a href="#"><img src="{{ asset('assets/images/widget-post-1.jpg') }}" alt="Widget Image" class="media-object"></a></div>
                                <div class="media-body"><a href="#"><span>TITLE JUST GOES HERE</span></a>
                                    <p>October 22, 2015</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left media-middle pull-left"><a href="#"><img src="{{ asset('assets/images/widget-post-2.jpg') }}" alt="Widget Image" class="media-object"></a></div>
                                <div class="media-body"><a href="#"><span>ANOTHER POST IS AWESOME</span></a>
                                    <p>October 17, 2015</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left media-middle pull-left"><a href="#"><img src="{{ asset('assets/images/widget-post-3.jpg') }}" alt="Widget Image" class="media-object"></a></div>
                                <div class="media-body"><a href="#"><span>WE DO LOVE WHAT WE DO</span></a>
                                    <p>October 9, 2015</p>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget widget_categories">
                            <h4>CATEGORIES</h4>
                            <ul>
                                <li><a href="#!">Services<small>7</small></a></li>
                                <li><a href="#!">Accommodation<small>12</small></a></li>
                                <li><a href="#!">Room &amp; suite<small>3</small></a></li>
                                <li><a href="#!">Spa &amp; gym<small>2</small></a></li>
                                <li><a href="#!">Pool &amp; swim<small>9</small></a></li>
                            </ul>
                        </aside>
                        <aside class="widget widget_tags">
                            <h4>TAGS</h4>
                            <ul>
                                <li><a href="#!">HOTEL</a></li>
                                <li><a href="#!">SERVICES</a></li>
                                <li><a href="#!">ROOM</a></li>
                                <li><a href="#!">QUALITY</a></li>
                                <li><a href="#!">POOL</a></li>
                                <li><a href="#!">LUXURY</a></li>
                                <li><a href="#!">GYM</a></li>
                                <li><a href="#!">BOOKING</a></li>
                                <li><a href="#!">SPA</a></li>
                                <li><a href="#!">GOLF</a></li>
                                <li><a href="#!">FOOTBALL</a></li>
                                <li><a href="#!">TV</a></li>
                                <li><a href="#!">WIFI</a></li>
                            </ul>
                        </aside>
                        <aside class="widget widget_recent_comments">
                            <h4>RECENT COMMENTS</h4>
                            <div class="media">
                                <div class="media-left media-middle pull-left"><a href="#"><i class="icon icon-Pen"></i></a></div>
                                <div class="media-body"><span>Mike Willmadeit</span><a href="#"><span>Quality services</span></a></div>
                            </div>
                            <div class="media">
                                <div class="media-left media-middle pull-left"><a href="#"><i class="icon icon-Pen"></i></a></div>
                                <div class="media-body"><span>Jessica Simpson</span><a href="#"><span>Hello World</span></a></div>
                            </div>
                            <div class="media">
                                <div class="media-left media-middle pull-left"><a href="#"><i class="icon icon-Pen"></i></a></div>
                                <div class="media-body"><span>Jimmy Henrdax</span><a href="#"><span>We do love what we do</span></a></div>
                            </div>
                        </aside>
                        <!-- END======================== SIDEBAR ==========================-->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- ============================ FOOTER ============================-->
@endsection
