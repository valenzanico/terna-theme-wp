@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php(the_post())
    <section class="author-container">
      <header class="author-header">
        @if (get_avatar_url(get_the_author_meta('ID')))
          <img class="author-avatar" src="{{ get_avatar_url(get_the_author_meta('ID'), ['size' => 300]) }}" alt="{{ get_the_author() }}" />
        @endif

        <div class="author-info">
          <h1 class="author-name">{{ get_the_author() }}</h1>

          @if (get_the_author_meta('description'))
            <p class="author-bio">{{ get_the_author_meta('description') }}</p>
          @endif

          @if (get_the_author_meta('user_url'))
            <a href="{{ get_the_author_meta('user_url') }}" class="author-website" target="_blank" rel="noopener">
              {{ get_the_author_meta('user_url') }}
            </a>
          @endif
        </div>
      </header>

      <div class="author-posts">
        <h2>Articoli di {{ get_the_author() }}</h2>
        <div class="posts-grid">
          @while(have_posts())
            @php(the_post())
            @include('components.post-card')
          @endwhile
        </div>
      </div>
    </section>
  @endwhile
@endsection
