<!-- Questa è il template per la home page del tuo sito WordPress. Estende il layout principale e definisce il contenuto della sezione principale della pagina. -->

@extends('layouts.app')

@section('content')
  <section class="homepage">
    <div class="homepage-content">
      <div class="title">
        {{ get_bloginfo('name') }}
      </div>
      @php
        $front_id = get_option('page_on_front');
        $front_content = '';
        if ($front_id) {
          $front_post = get_post($front_id);
          if ($front_post) {
            $front_content = apply_filters('the_content', $front_post->post_content);
          }
        }
      @endphp

      @if(!empty($front_content))
        <div class="home-content-extra gh-content">
          {!! $front_content !!}
        </div>
      @else
        <div class="home-p">
          <p class="home-p2">{{ get_bloginfo('description') }}</p>
        </div>
      @endif
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

    <section class="news-section">
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
    </section>
  </section>
@endsection
