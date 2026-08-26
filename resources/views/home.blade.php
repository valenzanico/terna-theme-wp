@extends('layouts.app')

@section('content')
  <section class="articles-page">
    <div class="articles-container">
      <div class="news-section news-section--full">
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
      </div>
    </div>
  </section>
@endsection
