@php
    $action = route('app.admin.permission.store');
    $method = 'POST';
@endphp
@if($permission)
    @php
        $action = route('app.admin.permission.update', ['permission' => $permission->name]);
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
                        @if($permission !== null)
                        <input type="hidden" name="id" value="{{ $permission->id }}">
                        @endif
                        <div class="mb-3">
                            <label class="form-label required">Display Name</label>
                            <input type="text" class="form-control @error('display_name') is-invalid @enderror"
                                   name="display_name" value="{{ $permission !== null ? $permission->display_name : '' }}"
                                   placeholder="Display Name" autocomplete="off">
                            @error('display_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input {{ $permission !== null ? 'disabled' : '' }} type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   value="{{ $permission !== null ? $permission->name : '' }}" placeholder="Name" autocomplete="off">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Guard Name</label>
                            <select id="gaurdTomSelector"
                                    class="form-select tomSelector @error('guard_name') is-invalid @enderror"
                                    name="guard_name" placeholder="Select guard name">
                                @foreach(array_keys(config('auth.guards')) as $guard)
                                    <option
                                        value="{{ $guard }}" {{ $permission !== null && $permission->guard_name === $guard ? 'selected' : '' }}>{{ \Illuminate\Support\Str::ucfirst($guard) }}</option>
                                @endforeach
                            </select>
                            @error('guard_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <button type="reset" class="btn btn-secondary ms-auto">Reset</button>
            <button type="submit" class="btn btn-primary ms-2">Send data</button>
        </div>
    </div>
</form>
