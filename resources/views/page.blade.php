@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php(the_post())
    <div class="page-container">
      <article class="page">
        @if (has_post_thumbnail())
          <div class="page-feature-image">
            {!! get_the_post_thumbnail(null, 'full', ['alt' => get_the_title()]) !!}
          </div>
        @endif

        <header class="page-header">
          <h1 class="page-title">{{ get_the_title() }}</h1>
        </header>

        <div class="page-content gh-content">
          {!! get_the_content() !!}
        </div>
      </article>
    </div>
  @endwhile
@endsection
