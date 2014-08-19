<?php
Breadcrumbs::register('dashboard', function($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.root'));
});
Breadcrumbs::register('list_tours', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Tours', route('admin.tour.index'));
});
Breadcrumbs::register('create_tour', function($breadcrumbs) {
    $breadcrumbs->parent('list_tours');
    $breadcrumbs->push('Create tour', route('admin.tour.create'));
});
Breadcrumbs::register('edit_tour', function($breadcrumbs,$tour) {
    $breadcrumbs->parent('list_tours');
    $breadcrumbs->push($tour->name, route('admin.tour.edit',$tour->id));
});

Breadcrumbs::register('index_reservations', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Reservations', route('admin.reservation.index'));
});
