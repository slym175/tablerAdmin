@extends('layouts.admin')

@section('title', 'Trash Permission')
@section('breadcrumbs')
    {{ Breadcrumbs::render('permission-trash') }}
@endsection
@section('actions')
    <div class="col-auto">
        <div class="btn-list">
            <a href="{{ route('app.admin.permission.index') }}" class="btn btn-default">
                <i class="fa fa-arrow-left me-2"></i>Back
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="user-index w-100">
        @includeIf('admin._partials._alert')
        @if(isset($permissions) && $permissions && count($permissions))
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                <tr>
                    <th class="w-1">No.</th>
                    <th>Display Name</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        </td>
                        <td><span class="text-muted">{{ $loop->index + 1 }}</span></td>
                        <td>{{ $permission->display_name }}</td>
                        <td>
                            {{ $permission->name }}
                        </td>
                        <td>
                            {{ $permission->guard_name }}
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
                                        <a class="dropdown-item" href="{{ route('app.admin.permission.restore', ['permission' => $permission->name]) }}">
                                            <i class="fa fa-save me-2"></i>Restore
                                        </a>
                                        <a class="dropdown-item text-danger" href="javascript:void(0)" data-bs-toggle="modal" data-form="form-delete-permission-{{ $permission->id }}" data-bs-target="#modal-delete-row">
                                            <i class="fa fa-trash me-2"></i>Delete
                                        </a>
                                        <form id="form-delete-permission-{{ $permission->id }}" method="POST" action="{{ route('app.admin.permission.delete', ['permission' => $permission->name]) }}" class="d-none">
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
            {{ $permissions->links() }}
            @includeIf('admin._partials._deleteModal')
        @else
            @includeIf('admin._partials._empty', ['title' => 'Add Permission', 'link' => route('app.admin.permission.create')])
        @endif
    </div>
@endsection
