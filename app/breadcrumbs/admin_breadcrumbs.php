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
            $breadcrumbs->push('New', route('admin.tour.create'));
        });

Breadcrumbs::register('edit_tour', function($breadcrumbs, $tour) {
            $breadcrumbs->parent('list_tours');
            $breadcrumbs->push($tour->name, route('admin.tour.edit', $tour->id));
        });

Breadcrumbs::register('profile', function($breadcrumbs) {
            $breadcrumbs->push('Profile', route('admin.profile'));
        });

Breadcrumbs::register('index_reservations', function($breadcrumbs) {
            $breadcrumbs->parent('dashboard');
            $breadcrumbs->push('Reservations', route('admin.reservation.index'));
        });

Breadcrumbs::register('create_reservation', function($breadcrumbs) {
            $breadcrumbs->parent('index_reservations');
            $breadcrumbs->push('New', route('admin.reservation.create'));
        });

Breadcrumbs::register('list_reviews', function($breadcrumbs) {
            $breadcrumbs->parent('list_tours');
            $breadcrumbs->push('Reviews', route('admin.review.index'));
        });

Breadcrumbs::register('list_inquiries', function($breadcrumbs) {
            $breadcrumbs->parent('list_tours');
            $breadcrumbs->push('Inquiries', route('admin.inquiry.index'));
        });
Breadcrumbs::register('setting', function($breadcrumbs) {
            $breadcrumbs->parent('dashboard');
            $breadcrumbs->push('Setting', '#');
        });
Breadcrumbs::register('static_pages', function($breadcrumbs) {
            $breadcrumbs->parent('dashboard');
            $breadcrumbs->push('Setting', route('admin.setting.static_pages'));
        });
