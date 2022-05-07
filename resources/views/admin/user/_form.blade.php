@php
    $action = route('app.admin.user.store');
    $method = 'POST';
@endphp
@if($user)
    @php
        $action = route('app.admin.user.update', ['user' => $user->name]);
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
                        @if($user !== null)
                            <input type="hidden" name="id" value="{{ $user->id }}">
                        @endif
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" autocomplete="off"
                                   placeholder="Name" value="{{ $user !== null ? $user->name : '' }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" autocomplete="off"
                                   placeholder="Email" value="{{ $user !== null ? $user->email : '' }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Password</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror"
                                   name="password" autocomplete="off"
                                   placeholder="Password" value="{{ $user !== null ? $user->password : '' }}">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                            <div class="mb-3">
                                <label class="form-label">Avatar</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="avatar" name="avatar">
                                    <button data-inputid="avatar" class="btn popup_selector" type="button">
                                        <i class="fa fa-file me-2"></i>Select Files
                                    </button>
                                </div>
                                @error('avatar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        <div id="elfinder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a href="{{ route('app.admin.user.index') }}" class="btn btn-link">Cancel</a>
            <button type="reset" class="btn btn-secondary ms-auto">Reset</button>
            <button type="submit" class="btn btn-primary ms-2">Send data</button>
        </div>
    </div>
</form>
