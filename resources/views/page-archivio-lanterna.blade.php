@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php(the_post())
    <main class="page-container archivio-lanterna-container">
      <article class="page archivio-lanterna-page">
        <header class="page-header archivio-lanterna-header">
          <p class="page-kicker">Archivio digitale</p>
          <h1 class="page-title">{{ get_the_title() }}</h1>

          @if (has_excerpt())
            <p class="page-intro">{{ get_the_excerpt() }}</p>
          @endif
        </header>

        <div class="page-content gh-content archivio-lanterna-content">
          {!! get_the_content() !!}
        </div>
      </article>
    </main>
  @endwhile
@endsection
