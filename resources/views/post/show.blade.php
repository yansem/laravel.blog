@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $date->translatedFormat('F d, Y H:i') }} • {{ $post->comments->count() }} комментария
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('assets/images/blog-post-featured-img.png') }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                {!! $post->content !!}
            </section>
            @auth
            <div class="row d-flex mx-auto">
                <p>{{ $post->likedPosts->count() }}</p>
                <form action="{{ route('post.like.store', $post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent">
                        @if($post->likedPosts->contains(auth()->user()->id))
                            <i class="fas fa-heart"></i>
                        @else
                            <i class="far fa-heart"></i>
                        @endif
                    </button>
                </form>
            </div>
            @endauth
            @guest
                <div class="d-flex">
                    <p>{{ $post->likedPosts->count() }}</p>
                    <i class="far fa-heart"></i>
                </div>
            @endguest
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <a href="{{ route('post.show', $relatedPost->id) }}"><img src="{{ asset('assets/images/blog_post_related_1.png') }}" alt="related post"
                                     class="post-thumbnail"></a>
                                <p class="post-category">{{ $relatedPost->category->title }}</p>
                                <h5 class="post-title">{{ $relatedPost->title }}</h5>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @auth
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Комментарий</label>
                                    <textarea name="message" id="message" class="form-control" placeholder="Напиши комментарий" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Отправить" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                    <section>
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{ $post->comments->count() }})</h2>
                        @foreach($post->comments as $comment)
                            <div class="row mb-5">
                                <div class="comment-text col-12">
                                    <div>
                                        {{ $comment->user->name }}
                                    </div>
                                    <span class="text-muted float-right">{{ $comment->carbonDate->diffForHumans() }}</span>
                                    {{ $comment->message }}
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </main>

    <section class="edica-footer-banner-section">
        <div class="container">
            <div class="footer-banner" data-aos="fade-up">
                <h1 class="banner-title">Download it now.</h1>
                <div class="banner-btns-wrapper">
                    <button class="btn btn-success"> <img src="{{ asset('assets/images/apple@1x.svg') }}" alt="ios"
                                                          class="mr-2">
                        App Store</button>
                    <button class="btn btn-success"> <img src="{{ asset('assets/images/android@1x.svg') }}"
                                                          alt="android"
                                                          class="mr-2"> Google Play</button>
                </div>
                <p class="banner-text">Add some helper text here to explain the finer details of your <br> product or service.</p>
            </div>
        </div>
    </section>
@endsection
