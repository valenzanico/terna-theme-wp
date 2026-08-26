@extends('layouts.app')

@section('content')
  <section class="homepage">
    <div class="homepage-content">
      {{-- left column intentionally left blank to keep header/menu on the left half --}}
    </div>

    <section class="news-section news-section--full">
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
