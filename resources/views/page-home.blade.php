@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php(the_post())
    <section class="homepage">
      <div class="homepage-content">
        <div class="title">{{ get_the_title() }}</div>

        <div class="home-content-extra gh-content">
          {!! get_the_content() !!}
        </div>

        <img
          class="vector-left-container"
          src="{{ Vite::asset('resources/images/vector-left.svg') }}"
          alt=""
          aria-hidden="true"
        >
        <img
          class="vector-right-container"
          src="{{ Vite::asset('resources/images/vector-right.svg') }}"
          alt=""
          aria-hidden="true"
        >
      </div>

      <div class="news-section">
        <div class="news-header">
          <div class="news-header-title">News</div>
        </div>
        <div class="news-content">
          <div class="news-list">
            @php
              $latest_posts = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 5,
              ]);
            @endphp

            @while($latest_posts->have_posts())
              @php($latest_posts->the_post())
              @include('components.post-card')
            @endwhile

            @php(wp_reset_postdata())
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection
