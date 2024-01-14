@extends('layouts.main2')
@section('main-container')
    <!-- END======================== HEADER ==========================-->
    </div>
    <div class="head_panel">
        <div style="background-image: url('{{ asset('assets/images/page-head-5.jpg') }}')" class="full_width_photo transparent_film">
            <div class="container">
                <div class="caption">
                    <h1>BLOG BOXED</h1><span>News from our Xenia family, in a different layout</span>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <section class="light_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">HOME</a></li>
                            <li><span>BLOG BOXED</span></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="post-grid masonry boxed_children">
                            <div class="row">
                                <div class="col-md-4 margin_bottom_half">
                                    <article class="post">
                                        <figure><a href="{{ url('single') }}" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-boxed-1.jpg') }}"></a>
                                            <div class="blog_bg_light"><span class="post_date">October 24, 2015</span>
                                                <h2 class="post_title"><a href="{{ url('single') }}">Quality services</a></h2>
                                                <div class="post_figure_and_info">
                                                    <div class="post_sub"><a href="{{ url('single') }}"><span class="post_info post_author">Henrik Pleth</span></a><a href="{{ url('single') }}"><span class="post_info post_categories">News</span></a></div>
                                                </div>
                                                <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many have great difficulty doing. The fear of gagging causes the throat to tighten up so that until you spit it out.</p><a href="{{ url('single') }}" class="btn btn-primary">Read More</a>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-md-4 margin_bottom_half">
                                    <article class="post">
                                        <figure><a href="{{ url('single') }}" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-boxed-2.jpg') }}"></a>
                                            <div class="blog_bg_light"><span class="post_date">October 22, 2015</span>
                                                <h2 class="post_title"><a href="{{ url('single') }}">King suite reconstruction</a></h2>
                                                <div class="post_figure_and_info">
                                                    <div class="post_sub"><a href="{{ url('single') }}"><span class="post_info post_author">Bailey Wonger</span></a><a href="{{ url('single') }}"><span class="post_info post_categories">Accommodation</span></a></div>
                                                </div>
                                                <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. This, and just leays to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="{{ url('single') }}" class="btn btn-primary">Read More</a>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-md-4 margin_bottom_half">
                                    <article class="post">
                                        <figure><a href="{{ url('single') }}" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-boxed-4.jpg') }}"></a>
                                            <div class="blog_bg_light"><span class="post_date">October 19, 2015</span>
                                                <h2 class="post_title"><a href="{{ url('single') }}">New room with pool</a></h2>
                                                <div class="post_figure_and_info">
                                                    <div class="post_sub"><a href="{{ url('single') }}"><span class="post_info post_author">Henrik Pleth</span></a><a href="{{ url('single') }}"><span class="post_info post_categories">Stories</span></a></div>
                                                </div>
                                                <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="{{ url('single') }}" class="btn btn-primary">Read More</a>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-md-4 margin_bottom_half">
                                    <article class="post">
                                        <figure><a href="{{ url('single') }}" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-boxed-3.jpg') }}"></a>
                                            <div class="blog_bg_light"><span class="post_date">October 18, 2015</span>
                                                <h2 class="post_title"><a href="{{ url('single') }}">Our old facility</a></h2>
                                                <div class="post_figure_and_info">
                                                    <div class="post_sub"><a href="{{ url('single') }}"><span class="post_info post_author">Bailey Wonger</span></a><a href="{{ url('single') }}"><span class="post_info post_categories">Accommodation</span></a></div>
                                                </div>
                                                <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="{{ url('single') }}" class="btn btn-primary">Read More</a>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-md-4 margin_bottom_half">
                                    <article class="post">
                                        <figure><a href="#" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-boxed-5.jpg') }}"></a>
                                            <div class="blog_bg_light"><span class="post_date">October 12, 2015</span>
                                                <h2 class="post_title"><a href="#">Summer is here</a></h2>
                                                <div class="post_figure_and_info">
                                                    <div class="post_sub"><a href="#"><span class="post_info post_author">Parsley Montana</span></a><a href="#"><span class="post_info post_categories">News</span></a></div>
                                                </div>
                                                <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                                <div class="col-md-4 margin_bottom_half">
                                    <article class="post">
                                        <figure><a href="#" title="Post"><img alt="Post with Slider" src="{{ asset('assets/images/blog-boxed-6.jpg') }}"></a>
                                            <div class="blog_bg_light"><span class="post_date">October 9, 2015</span>
                                                <h2 class="post_title"><a href="#">Luxurious champagne</a></h2>
                                                <div class="post_figure_and_info">
                                                    <div class="post_sub"><a href="#"><span class="post_info post_author">Bailey Wonger</span></a><a href="#"><span class="post_info post_categories">Stories</span></a></div>
                                                </div>
                                                <p class="text-justify">The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It's like riding a bike - once you get the hang of it, it becomes second nature.</p><a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- ============================ FOOTER ============================-->
@endsection
