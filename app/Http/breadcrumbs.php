<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('/'));
});

// Breadcrumb for agents
Breadcrumbs::register('agents.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Agent', route('agents.index'));
});

Breadcrumbs::register('agents.create', function ($breadcrumbs) {
    $breadcrumbs->parent('agents.index');
    $breadcrumbs->push('Create', route('agents.create'));
});

Breadcrumbs::register('agents.show', function ($breadcrumbs, $agent) {
    $breadcrumbs->parent('agents.index');
    $breadcrumbs->push($agent->email, route('agents.show', $agent->id));
});

Breadcrumbs::register('agents.edit', function ($breadcrumbs, $agent) {
    $breadcrumbs->parent('agents.show', $agent);
    $breadcrumbs->push('Edit', route('agents.edit'));
});

// Breadcrumbs for movies
Breadcrumbs::register('movies.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Movie', route('movies.index'));
});

Breadcrumbs::register('movies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('movies.index');
    $breadcrumbs->push('Create', route('movies.create'));
});

Breadcrumbs::register('movies.show', function ($breadcrumbs, $movie) {
    $breadcrumbs->parent('movies.index');
    $breadcrumbs->push($movie->title, route('movies.show', $movie->id));
});

Breadcrumbs::register('movies.edit', function ($breadcrumbs, $movie) {
    $breadcrumbs->parent('movies.show', $movie);
    $breadcrumbs->push('Edit', route('movies.edit'));
});



