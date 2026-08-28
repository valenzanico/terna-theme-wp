@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php(the_post())
    <main class="page-container archivio-lanterna-container">
      
  
        <header class="page-header archivio-lanterna-header">
          
          <h1 class="page-title">Storico dei Lanterna pubblicati
          </h1>

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
