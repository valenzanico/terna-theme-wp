@extends('layouts.app')

@section('content')
  <section class="tag-container">
    <header class="tag-header">
      <h1 class="tag-name">{{ get_the_archive_title() }}</h1>
      @if (get_the_archive_description())
        <p class="tag-description">{!! get_the_archive_description() !!}</p>
      @endif
    </header>

    <div class="tag-posts">
      <div class="posts-grid">
        @while(have_posts())
          @php(the_post())
          @include('components.post-card')
        @endwhile
      </div>
    </div>

    @include('components.pagination')
  </section>
@endsection
