@extends('desktop.layouts.app')
@section('content')

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
					============================================= -->
            <div class="postcontent nobottommargin clearfix">

                <div class="single-post nobottommargin">

                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">

                        <!-- Entry Title
                        ============================================= -->
                        <div class="entry-title">
                            <h2>{{ $post->post_title }}</h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Meta
                        ============================================= -->
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-calendar3"></i> {{ $post->created_at }}</li>
                            <li><a href="#"><i class="icon-user"></i> {{ $post->post_author }}</a></li>
                            <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
                            <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
                            <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                        </ul><!-- .entry-meta end -->

                        <!-- Entry Image
                        ============================================= -->
                        <div class="entry-image">
                            <a href="#"><img src="images/blog/full/1.jpg" alt="Blog Single"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">
                            {!! $post->post_content !!}
                    </div><!-- .entry end -->

                    <!-- Post Navigation
                    ============================================= -->
                    <div class="post-navigation clearfix">

                        <div class="col_half nobottommargin">
                            <a href="#">&lArr; This is a Standard post with a Slider Gallery</a>
                        </div>

                        <div class="col_half col_last tright nobottommargin">
                            <a href="#">This is an Embedded Audio Post &rArr;</a>
                        </div>

                    </div><!-- .post-navigation end -->

                    <div class="line"></div>
                        
                    <h4>相关文章:</h4>

                    <div class="related-posts clearfix">

                        <div class="col_half nobottommargin">

                            <div class="mpost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="images/blog/small/10.jpg" alt="Blog Single"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">This is an Image Post</a></h4>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 10th July 2014</li>
                                        <li><a href="#"><i class="icon-comments"></i> 12</a></li>
                                    </ul>
                                    <div class="entry-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia nisi perferendis.</div>
                                </div>
                            </div>

                            <div class="mpost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="images/blog/small/20.jpg" alt="Blog Single"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">This is a Video Post</a></h4>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th July 2014</li>
                                        <li><a href="#"><i class="icon-comments"></i> 16</a></li>
                                    </ul>
                                    <div class="entry-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia nisi perferendis.</div>
                                </div>
                            </div>

                        </div>

                        <div class="col_half nobottommargin col_last">

                            <div class="mpost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="images/blog/small/21.jpg" alt="Blog Single"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">This is a Gallery Post</a></h4>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 8th Aug 2014</li>
                                        <li><a href="#"><i class="icon-comments"></i> 8</a></li>
                                    </ul>
                                    <div class="entry-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia nisi perferendis.</div>
                                </div>
                            </div>

                            <div class="mpost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="images/blog/small/22.jpg" alt="Blog Single"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">This is an Audio Post</a></h4>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 22nd Aug 2014</li>
                                        <li><a href="#"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia nisi perferendis.</div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Comments
                    ============================================= -->
                    <div id="comments" class="clearfix">

                        <h3 id="comments-title"><span>3</span> 条评论</h3>

                        <!-- Comments List
                        ============================================= -->
                        <ol class="commentlist clearfix">

                            <li class="comment even thread-even depth-1" id="li-comment-1">

                                <div id="comment-1" class="comment-wrap clearfix">

                                    <div class="comment-meta">

                                        <div class="comment-author vcard">

													<span class="comment-avatar clearfix">
													<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

                                        </div>

                                    </div>

                                    <div class="comment-content clearfix">

                                        <div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2012 at 10:46 am</a></span></div>

                                        <p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

                                        <a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

                                    </div>

                                    <div class="clear"></div>

                                </div>


                                <ul class='children'>

                                    <li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">

                                        <div id="comment-3" class="comment-wrap clearfix">

                                            <div class="comment-meta">

                                                <div class="comment-author vcard">

															<span class="comment-avatar clearfix">
															<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=40&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D40&amp;r=G' class='avatar avatar-40 photo' height='40' width='40' /></span>

                                                </div>

                                            </div>

                                            <div class="comment-content clearfix">

                                                <div class="comment-author"><a href='#' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

                                                <p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                                                <a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

                                            </div>

                                            <div class="clear"></div>

                                        </div>

                                    </li>

                                </ul>

                            </li>

                            <li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1" id="li-comment-2">

                                <div id="comment-2" class="comment-wrap clearfix">

                                    <div class="comment-meta">

                                        <div class="comment-author vcard">

													<span class="comment-avatar clearfix">
													<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60' /></span>

                                        </div>

                                    </div>

                                    <div class="comment-content clearfix">

                                        <div class="comment-author"><a href='http://themeforest.net/user/semicolonweb' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

                                        <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

                                        <a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

                                    </div>

                                    <div class="clear"></div>

                                </div>

                            </li>

                        </ol><!-- .commentlist end -->

                        <div class="clear"></div>

                        <!-- Comment Form
                        ============================================= -->
                        <div id="respond" class="clearfix">

                            <h3>留<span>言</span></h3>

                            <form class="clearfix" action="#" method="post" id="commentform">

                                <div class="col_one_third">
                                    <label for="author">昵称</label>
                                    <input type="text" name="author" id="author" value="" size="22" tabindex="1" class="sm-form-control" />
                                </div>

                                <div class="col_one_third">
                                    <label for="email">邮箱</label>
                                    <input type="text" name="email" id="email" value="" size="22" tabindex="2" class="sm-form-control" />
                                </div>

                                <div class="col_one_third col_last">
                                    <label for="url">网站</label>
                                    <input type="text" name="url" id="url" value="" size="22" tabindex="3" class="sm-form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="comment">评论</label>
                                    <textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control"></textarea>
                                </div>

                                <div class="col_full nobottommargin">
                                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">提交评论</button>
                                </div>

                            </form>

                        </div><!-- #respond end -->

                    </div><!-- #comments end -->

                </div>

            </div><!-- .postcontent end -->




        </div>

            @include('desktop.layouts.sidebar')


        </div>

    </div>

</section><!-- #content end -->
@stop