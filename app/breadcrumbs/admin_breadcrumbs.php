<?php
Breadcrumbs::register('dashboard', function($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.root'));
});
Breadcrumbs::register('list_tours', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Tours', route('admin.tours.index'));
});
Breadcrumbs::register('create_tour', function($breadcrumbs) {
    $breadcrumbs->parent('list_tours');
    $breadcrumbs->push('Create tour', route('admin.tours.create'));
});
Breadcrumbs::register('edit_tour', function($breadcrumbs,$tour) {
    $breadcrumbs->parent('list_tours');
    $breadcrumbs->push($tour->name, route('admin.tours.edit',$tour->id));
});

