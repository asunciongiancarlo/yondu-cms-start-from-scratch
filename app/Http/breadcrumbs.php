<?php

// Home
Breadcrumbs::register('cms.index', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('cms.index'));
});

//Home > Modules 
Breadcrumbs::register('modules.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('Modules', route('modules.index'));
});

//Home > Users 
Breadcrumbs::register('cms.user.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('Users', route('cms.user.index'));
});

//Home > Users > Add Users
Breadcrumbs::register('cms.user.create', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.user.index');
    $breadcrumbs->push('Add', route('cms.user.create'));
});

//Home > Users > Edit
Breadcrumbs::register('cms.user.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.user.index');
    $breadcrumbs->push('Edit', route('cms.user.create'));
});

//Home > Users > User Access
Breadcrumbs::register('cms.role.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.user.index');
    $breadcrumbs->push('User Access', route('cms.role.index'));
});

Breadcrumbs::register('cms.role.create', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.role.index');
    $breadcrumbs->push('Add', route('cms.role.create'));
});

//Home > Users > User Access > Modify
Breadcrumbs::register('cms.role.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.role.index');
    $breadcrumbs->push('Modify', route('cms.role.edit'));
});

// Home > General Settings
Breadcrumbs::register('cms.general_settings.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('General Settings', route('cms.general_settings.index'));
});



Breadcrumbs::register('cms.user.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.user.index');
    $breadcrumbs->push('Edit', route('cms.user.create'));
});

//Home > Users > User Access
Breadcrumbs::register('cms.role.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.user.index');
    $breadcrumbs->push('User Access', route('cms.role.index'));
});

// Home > General Settings
Breadcrumbs::register('cms.general_settings.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('General Settings', route('cms.general_settings.index'));
});


