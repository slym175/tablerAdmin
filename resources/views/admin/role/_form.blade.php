@php
    $action = route('app.admin.role.store');
    $method = 'POST';
@endphp
@if($role)
    @php
        $action = route('app.admin.role.update', ['role' => $role->name]);
        $method = 'PUT';
    @endphp
@endif
@includeIf('admin._partials._alert')
<form action="{{ $action }}" method="POST" class="card" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        @if($role !== null)
                            <input type="hidden" name="id" value="{{ $role->id }}">
                        @endif
                        <div class="mb-3">
                            <label class="form-label required">Display Name</label>
                            <input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" autocomplete="off"
                                   placeholder="Display Name" value="{{ $role !== null ? $role->display_name : '' }}">
                            @error('display_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input {{ $role !== null ? 'disabled' : '' }} type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off"
                                   placeholder="Name" value="{{ $role !== null ? $role->name : '' }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Guard Name</label>
                            <select id="gaurdTomSelector" class="form-select tomSelector @error('guard_name') is-invalid @enderror" name="guard_name" placeholder="Select guard name">
                                @foreach(array_keys(config('auth.guards')) as $guard)
                                    <option value="{{ $guard }}" {{ $role !== null && $role->guard_name === $guard ? 'selected' : '' }}>{{ \Illuminate\Support\Str::ucfirst($guard) }}</option>
                                @endforeach
                            </select>
                            @error('guard_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                            <?php
                            $selectedPermissions = isset($role) && $role != null && $role->permissions ? $role->permissions->pluck('name')->toArray() : [];
                            ?>
                        <div class="mb-3">
                            <label class="form-label">Permissions</label>
                            <select id="permissionsTomSelector" class="form-select tomSelector" multiple name="permissions[]" placeholder="Select permissions">
                                @foreach($permissions as $name => $permission)
                                    <option value="{{ $name }}" {{ in_array($name, $selectedPermissions) ? 'selected' : '' }}>{{ $permission }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a href="{{ route('app.admin.role.index') }}" class="btn btn-link">Cancel</a>
            <button type="reset" class="btn btn-secondary ms-auto">Reset</button>
            <button type="submit" class="btn btn-primary ms-2">Send data</button>
        </div>
    </div>
</form>
