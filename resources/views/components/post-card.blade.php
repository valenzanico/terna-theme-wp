<article class="article {{ post_class() }}">
  <a href="{{ get_permalink() }}" class="article-link">
    <div class="article-media">
      @if (has_post_thumbnail())
        {!! get_the_post_thumbnail(null, 'medium', ['class' => 'article-image', 'alt' => get_the_title()]) !!}
      @endif
    </div>
    <div class="article-content">
      <p class="article-title">{{ get_the_title() }}</p>
      @if (has_excerpt())
        <p class="article-excerpt">{{ wp_strip_all_tags(get_the_excerpt()) }}</p>
      @endif
    </div>
  </a>
</article>
