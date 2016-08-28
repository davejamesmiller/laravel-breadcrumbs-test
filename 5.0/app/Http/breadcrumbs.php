<?php

Breadcrumbs::register('home', function($breadcrumbs) {
	$breadcrumbs->push('Home', route('home'), ['custom' => 'Custom data for Home']);
});

Breadcrumbs::register('blog', function($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Blog', route('blog'));
});

Breadcrumbs::register('category', function($breadcrumbs, $category) {
	$breadcrumbs->parent('blog');

	foreach ($category->ancestors as $ancestor) {
		$breadcrumbs->push($ancestor->title, route('category', $ancestor->id));
	}

	$breadcrumbs->push($category->title, route('category', $category->id));
});

Breadcrumbs::register('post', function($breadcrumbs, $post) {
	$breadcrumbs->parent('category', $post->category);
	$breadcrumbs->push($post->title, route('post', $post->id));
});

Breadcrumbs::register('text', function($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Text 1', null, ['custom' => 'Custom data for Text 1']);
	$breadcrumbs->push('Text 2');
	$breadcrumbs->push('Text 3');
});
