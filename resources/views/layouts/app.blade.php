<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="@php(bloginfo('charset'))">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
    @php(wp_head())
  </head>
  <body @php(body_class())>
    @include('sections.header')

    <main>
      @yield('content')
    </main>

    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
