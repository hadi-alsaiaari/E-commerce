{{-- @dd(old('status', $admin->status) !== null && old('status', $admin->status) == 0) --}}
<div class="form-body">
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput1">{{ __('words.name') }}</label>
            <input type="text" id="projectinput1" class="form-control" placeholder="{{ __('words.name') }}" name="name"
                value="{{ old('name', $admin->name) }}">
            @error('name')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput2">{{ __('words.email') }}</label>
            <input type="email" id="projectinput2" class="form-control" placeholder="{{ __('words.email') }}"
                name="email" value="{{ old('email', $admin->email) }}">
            @error('email')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput3">{{ __('words.password') }}</label>
            <input type="password" id="projectinput3" class="form-control" placeholder="{{ __('words.password') }}"
                name="password">
            @error('password')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput4">{{ __('words.password_confirmation') }}</label>
            <input type="password" id="projectinput4" class="form-control"
                placeholder="{{ __('words.password_confirmation') }}" name="password_confirmation">
            @error('password_confirmation')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-2">
            <div class="form-group">
                <label>{{ __('words.select_role') }}</label>
                <select class="form-control" name="role_id">
                    <option>{{ __('words.select_role') }}</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('role_id', $admin->role_id) == $role->id)>
                            {{ $role->role }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6 mb-2">
            <div class="form-group mt-1">
                <label>{{ __('words.select_status') }}</label>
                <select class="form-control" name="status">
                    <option>{{ __('words.select_status') }}</option>
                    <option value="1" @selected(old('status', $admin->status) == 1)>{{ __('words.active') }}</option>
                    <option value="0" @selected(old('status', $admin->status) !== null && old('status', $admin->status) == 0)>{{ __('words.inactive') }}</option>
                </select>
                @error('status')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="form-actions center">
    <button type="button" class="btn btn-warning mr-1"
        onclick="window.location.href='{{ route('dashboard.admins.index', ['page' => request()->page]) }}'">
        <i class="ft-x"></i> {{ $button_cancel }}
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> {{ $button_label }}
    </button>
</div>
