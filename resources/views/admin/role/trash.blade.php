@extends('layouts.admin')

@section('title', 'Trash Role')
@section('breadcrumbs')
    {{ Breadcrumbs::render('role-trash') }}
@endsection
@section('actions')
    <div class="col-auto">
        <div class="btn-list">
            <a href="{{ route('app.admin.role.index') }}" class="btn btn-default">
                <i class="fa fa-arrow-left me-2"></i>Back
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="user-index w-100">
        @includeIf('admin._partials._alert')
        @if(isset($roles) && $roles && count($roles))
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                <tr>
                    <th class="w-1">No.</th>
                    <th>Display Name</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Permissions</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        </td>
                        <td><span class="text-muted">{{ $loop->index + 1 }}</span></td>
                        <td>{{ $role->display_name }}</td>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td>
                            {{ $role->guard_name }}
                        </td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="badge bg-info">{{ $permission->display_name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div data-bs-toggle="tooltip" data-bs-placement="left" title="Deleted at">
                                <i class="fa fa-clock me-1"></i>
                                {{ Carbon\Carbon::parse($permission->deleted_at)->diffForHumans() }}
                            </div>
                        </td>
                        <td class="text-end">
                            <div class="btn-list flex-nowrap">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                        <i class="fa fa-cog me-1"></i> Actions
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('app.admin.role.restore', ['role' => $role->name]) }}">
                                            <i class="fa fa-save me-2"></i>Restore
                                        </a>
                                        <a class="dropdown-item text-danger" href="javascript:void(0)" data-bs-toggle="modal" data-form="form-delete-role-{{ $role->id }}" data-bs-target="#modal-delete-row">
                                            <i class="fa fa-trash me-2"></i>Delete
                                        </a>
                                        <form id="form-delete-role-{{ $role->id }}" method="POST" action="{{ route('app.admin.role.delete', ['role' => $role->name]) }}" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $roles->links() }}
            @includeIf('admin._partials._deleteModal')
        @else
            @includeIf('admin._partials._empty', ['title' => 'Add Role', 'link' => route('app.admin.role.create')])
        @endif
    </div>
@endsection
