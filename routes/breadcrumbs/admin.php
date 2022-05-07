<?php
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('app.admin.dashboard'));
});

Breadcrumbs::for('filemanager', function ($trail) {
    $trail->push('File Manager', route('app.admin.filemanager'));
});

Breadcrumbs::for('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('app.admin.user.index'));
});

Breadcrumbs::for('user-create', function ($trail) {
    $trail->parent('user');
    $trail->push('New User', route('app.admin.user.create'));
});

Breadcrumbs::for('role', function ($trail) {
    $trail->parent('user');
    $trail->push('Role', route('app.admin.role.index'));
});

Breadcrumbs::for('role-create', function ($trail) {
    $trail->parent('role');
    $trail->push('New Role', route('app.admin.role.create'));
});

Breadcrumbs::for('role-edit', function ($trail, $role) {
    $trail->parent('role');
    $trail->push('Edit Role - '.$role->display_name, route('app.admin.role.edit', ['role' => $role->name]));
});

Breadcrumbs::for('role-view', function ($trail, $role) {
    $trail->parent('role');
    $trail->push('View Role - '.$role->display_name, route('app.admin.role.show', ['role' => $role->name]));
});

Breadcrumbs::for('role-trash', function ($trail) {
    $trail->parent('role');
    $trail->push('Trash Role', route('app.admin.role.trash'));
});

Breadcrumbs::for('permission', function ($trail) {
    $trail->parent('user');
    $trail->push('Permission', route('app.admin.permission.index'));
});

Breadcrumbs::for('permission-create', function ($trail) {
    $trail->parent('permission');
    $trail->push('New Permission', route('app.admin.permission.create'));
});

Breadcrumbs::for('permission-edit', function ($trail, $permission) {
    $trail->parent('permission');
    $trail->push('Edit Permission - '.$permission->display_name, route('app.admin.permission.edit', ['permission' => $permission->name]));
});

Breadcrumbs::for('permission-view', function ($trail, $permission) {
    $trail->parent('permission');
    $trail->push('View Permission - '.$permission->display_name, route('app.admin.permission.show', ['permission' => $permission->name]));
});

Breadcrumbs::for('permission-trash', function ($trail) {
    $trail->parent('permission');
    $trail->push('Trash Permission', route('app.admin.permission.trash'));
});
