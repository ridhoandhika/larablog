@extends('layouts.frontend')
@section('content')
    <article class="blog-post px-3 py-5 p-md-5">
        <div class="container">
            <header class="blog-post-header">
                <h2 class="title mb-2">{{ $post->tittle }}</h2>
                <div class="meta mb-3"><span class="date">Published {{ $post->created_at->diffForHumans() }}</span>
                    <span class="category"><a href="#">{{ $post->category->name }}</a></span>
                </div>
            </header>

            <div class="blog-post-body">
                {!! $post->content !!}
            </div>

            <nav class="blog-nav nav nav-justified my-5">
                @if ($prev_post)
                    <a class="nav-link-prev nav-item nav-link rounded-left"
                        href="{{ route('post.single', ['slug' => $prev_post->slug]) }}">Previous<i
                            class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                @endif
                @if ($next_post)
                    <a class="nav-link-next nav-item nav-link rounded-right"
                        href="{{ route('post.single', ['slug' => $next_post->slug]) }}">Next<i
                            class="arrow-next fas fa-long-arrow-alt-right"></i></a>
                @endif

            </nav>

            <div class="blog-comments-section">
                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT 
                     *  THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR 
                     *  PLATFORM OR CMS.
                     *  
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: 
                     *  https://disqus.com/admin/universalcode/#configuration-variables
                     */
                    /*
                    var disqus_config = function () {
                        // Replace PAGE_URL with your page's canonical URL variable
                        this.page.url = PAGE_URL;  
                        
                        // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        this.page.identifier = PAGE_IDENTIFIER; 
                    };
                    */

                    (function() { // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
                        var d = document,
                            s = d.createElement('script');

                        // IMPORTANT: Replace 3wmthemes with your forum shortname!
                        s.src = 'https://3wmthemes.disqus.com/embed.js';

                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();

                </script>
                <noscript>
                    Please enable JavaScript to view the
                    <a href="https://disqus.com/?ref_noscript" rel="nofollow">
                        comments powered by Disqus.
                    </a>
                </noscript>
            </div>
            <!--//blog-comments-section-->

        </div>
        <!--//container-->
    </article>
@endsection
