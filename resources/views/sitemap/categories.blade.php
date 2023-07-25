<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($articles as $article)
  <url>
    <loc>{{route('category',['slug'=>$article->slug])}}</loc>
    <lastmod>{{ $article->created_at->tz('UTC')->toAtomString() }}</lastmod>
    <priority>0.9</priority>
  </url>
@endforeach
</urlset>