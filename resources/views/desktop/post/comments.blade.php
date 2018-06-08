<!-- Comments============================================= -->
@if(cache()->get('backend_global_comment_status') == "off")
    <div class="clearfix">
        已关闭评论功能
    </div>

    @elseif(isset($post->comments_status) && $post->comments_status != 'on')
    <div class="clearfix">
        本文章已关闭评论功能
    </div>

@else
    <div id="comments" class="clearfix">

        <h3 id="comments-title"><span>{{ $comment_count }}</span> 条评论</h3>

        <!-- Comments List
        ============================================= -->
        <ol class="commentlist clearfix">
            @forelse($comments as $item)
                <li class="comment" id="li-comment-{{ $item->id }}">
                    <div id="comment-2" class="comment-wrap clearfix">
                        <div class="comment-meta">
                            <div class="comment-author vcard">
                            <span class="comment-avatar clearfix">
                                <img alt='' src='{{ config('app.APP_URL').$item->user->avatar }}' class='avatar avatar-60 photo' height='60' width='60'/>
                            </span>
                            </div>
                        </div>
                        <div class="comment-content clearfix">
                            <div class="comment-author">
                                <a href='javascript:;' id="comment-author-{{ $item->id }}" rel='external nofollow'
                                   class='url'>{{ $item->user->name }}</a><span>{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                            <p>{{ $item->content }}</p>
                            <span class='comment-reply-link' id="reply-comment-{{ $item->id }}"><i
                                        class="icon-reply"></i></span>
                            <span class="comment-delete">
                            <a href="javascript:;" title="删除" onclick="comment_delete({{ $item->id }})">
                             <i class="icon-trash"></i></a>
                        </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </li>
                @if(is_array($item['child']))

                    <ul class='children'>
                        @foreach($item['child'] as $subitem)

                            <li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-{{ $subitem->id }}">
                                <div id="comment-3" class="comment-wrap clearfix">
                                    <div class="comment-meta">
                                        <div class="comment-author vcard">
                                        <span class="comment-avatar clearfix">
                                            <img alt=''
                                                 src='{{ config('app.APP_URL').$subitem->user->avatar }}'
                                                 class='avatar avatar-40 photo' height='40' width='40'/>
                                        </span>
                                        </div>

                                    </div>

                                    <div class="comment-content clearfix">

                                        <div class="comment-author">
                                            <a href='javascript:;' id="comment-author-{{ $subitem->id }}" rel='external nofollow' class='url'>{{ $subitem->user->name }}</a><span>{{ $subitem->created_at->diffForHumans() }}</span>
                                        </div>

                                        <p>{{ $subitem->content }}</p>

                                        <a class='comment-reply-link' id="reply-comment-{{ $subitem->id }}"><i
                                                    class="icon-reply"></i></a>
                                        <span class="comment-delete">
                                           <a href="javascript:;" title="删除" onclick="comment_delete({{ $item->id }})"><i class="icon-trash"></i>
                                           </a>
                        </span>

                                    </div>

                                    <div class="clear"></div>

                                </div>

                            </li>
                        @endforeach
                    </ul>
                @endif
            @empty
            @endforelse

        </ol><!-- .commentlist end -->

        <div class="clear"></div>

        <!-- Comment Form
        ============================================= -->
        <div id="respond" class="clearfix">

            <h3>评<span>论</span></h3>
            @if (session('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ session('error') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <ol>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif


            <form class="clearfix" action="{{ route('comment.store') }}" method="post" id="commentform">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="pid" value="0" id="pid">
                {{ csrf_field() }}
                <div class="col_full">
                    <label for="comment">评论</label>

                    @if(auth::check())
                        <textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control"></textarea>
                    @else
                        <div class="sign-container"><a href="{{ url('/login') }}" class="button button-3d nomargin">登录</a>
                            <span>后发表评论</span></div>
                    @endif
                </div>

                <div class="col_full nobottommargin">
                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                            class="button button-3d nomargin">提交评论
                    </button>
                </div>

            </form>

        </div><!-- #respond end -->

    </div><!-- #comments end -->

    <form id="comment_delete" method="POST" style="display:none">
        <input type="hidden" name="_method" value="delete">
        {{ csrf_field() }}
    </form>
    <script>
        function comment_delete(id) {
            var delete_form = document.getElementById("comment_delete");
            delete_form.action = "http://l.cn/comment/" + id;
            document.getElementById("comment_delete").submit();
        }
    </script>
@endif


