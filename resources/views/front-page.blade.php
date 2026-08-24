@extends('layouts.app')

@section('content')
  <section class="homepage">
    <div class="homepage-content">
      <div class="title">
        {{ get_bloginfo('name') }}
      </div>
      <div class="home-p">
        <p class="home-p2">{{ get_bloginfo('description') }}</p>
      </div>
    </div>

    <section class="news-section">
      <div class="news-header">
        <div class="news-header-title">News</div>
      </div>
      <div class="news-content">
        <div class="news-list">
          @while(have_posts())
            @php(the_post())
            @include('components.post-card')
          @endwhile
        </div>
      </div>
    </section>
  </section>
@endsection
