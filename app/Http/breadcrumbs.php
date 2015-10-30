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

// Breadcrumbs for server
Breadcrumbs::register('server.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Server', route('server.index'));
});

Breadcrumbs::register('server.create', function ($breadcrumbs) {
    $breadcrumbs->parent('server.index');
    $breadcrumbs->push('Create', route('server.create'));
});

Breadcrumbs::register('server.show', function ($breadcrumbs, $server) {
    $breadcrumbs->parent('server.index');
    $breadcrumbs->push($server->title, route('server.show', $server->id));
});

Breadcrumbs::register('server.edit', function ($breadcrumbs, $server) {
    $breadcrumbs->parent('server.show', $server);
    $breadcrumbs->push('Edit', route('server.edit'));
});


