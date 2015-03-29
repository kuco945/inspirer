@extends('common')

@section('body')
<div class="article-list">
	@forelse($articles as $article)
	<div class="article-container">
		<ul class="article-information">
			<li><i class="fa fa-calendar"></i>{{ date('Y-m-d', strtotime($article->created_at)) }}</li>
			<li><i class="fa fa-clock-o"></i>{{ date('H:i', strtotime($article->created_at)) }}</li>
			<li><i class="fa fa-inbox"></i><a href="{{ url('category', $article->category_id) }}">{{ $article->category->display_name }}</a></li>
		</ul>
		<article>
            <a href="{{ url('article', $article->id) }}" class="article-title"><h1>{{ $article->title }}</h1></a>
			<div class="article-body">
				{!! \App\Inspirer\ArticleProcess::getSummary($article->content, $parse) !!}
			</div>
			<div class="article-control">
				<a href="{{ url('article', $article->id) }}#page-break-anchor" class="btn btn-primary">Read more</a>
			</div>
		</article>
	</div>
	@empty
	@endforelse
</div>
	
<div class="widget-container">
	<div class="widget category-view-widget">
		<h1>分类</h1>
		<ul>
			@forelse($categories as $category)
			<li><a href="{{ url('category', $category->id) }}">{{ $category->display_name }} ({{ $category->articles->count() }})</a></li>
			@empty
			@endforelse
		</ul>
	</div>
</div>
@stop