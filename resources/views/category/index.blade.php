@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
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
