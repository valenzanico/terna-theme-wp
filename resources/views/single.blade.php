@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php(the_post())
    <div class="post-container">
      <article class="post" data-image-style="wide">
        @if (has_post_thumbnail())
          <div class="post-feature-image">
            {!! get_the_post_thumbnail(null, 'full', ['alt' => get_the_title()]) !!}
          </div>
        @endif

        <header class="post-header">
          <h1 class="post-title">{{ get_the_title() }}</h1>

          <div class="post-meta">
            <time datetime="{{ get_the_date('Y-m-d') }}">{{ get_the_date('d F Y') }}</time>
            @if (get_the_author())
              <span class="post-authors">
                <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}">{{ get_the_author() }}</a>
              </span>
            @endif
            @if (has_category() || has_tag())
              <div class="post-tags">
                @foreach (get_the_tags() ?: [] as $tag)
                  <a href="{{ get_tag_link($tag) }}" class="tag">{{ $tag->name }}</a>
                @endforeach
              </div>
            @endif
          </div>
        </header>

        <div class="post-content gh-content">
          {!! get_the_content() !!}
        </div>
      </article>
    </div>

    <nav class="post-navigation">
      @if (get_previous_post())
        <a href="{{ get_permalink(get_previous_post()) }}" class="nav-prev">
          <span class="nav-label">Articolo precedente</span>
          <span class="nav-title">{{ get_the_title(get_previous_post()) }}</span>
        </a>
      @endif

      @if (get_next_post())
        <a href="{{ get_permalink(get_next_post()) }}" class="nav-next">
          <span class="nav-label">Prossimo articolo</span>
          <span class="nav-title">{{ get_the_title(get_next_post()) }}</span>
        </a>
      @endif
    </nav>
  @endwhile
@endsection
