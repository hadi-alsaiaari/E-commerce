<div class="form-body">
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput1">{{ __('words.role_en') }}</label>
            <input type="text" id="projectinput1" class="form-control" placeholder="{{ __('words.role_en') }}"
                name="role[en]" value="{{ old('role.en', $role->getTranslation('role', 'en') ?? '') }}">
            @error('role.en')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput2">{{ __('words.role_ar') }}</label>
            <input type="text" id="projectinput2" class="form-control" placeholder="{{ __('words.role_ar') }}"
                name="role[ar]" value="{{ old('role.ar', $role->getTranslation('role', 'ar') ?? '') }}">
            @error('role.ar')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <fieldset>
                <input type="checkbox" id="select-all-permissions" name="checked_all" {{ $role->permissions == -1 ? 'checked' : '' }}>
                <label for="select-all-permissions" style="font-weight: bold; color: #007bff;">
                    {{ __('words.select_all_permissions') }}
                </label>
            </fieldset>
        </div>
    </div>

    <div class="row">
        @foreach (app('permissions') as $key => $value)
            <div class="col-md-3">
                <fieldset>
                    <input value="{{ $key }}" type="checkbox" id="permission-{{ $key }}" name="permissions[]" class="permission-checkbox"
                        @checked(in_array($key, old('permissions', [])) || $role->permissions & $key)>
                    <label for="permission-{{ $key }}">{{ $value }}</label>
                </fieldset>
            </div>
        @endforeach
    </div>
    @error('permissions')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
    @error('permissions.*')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>
<div class="form-actions center">
    <button type="button" class="btn btn-warning mr-1"
        onclick="window.location.href='{{ route('dashboard.roles.index', ['page' => request()->page]) }}'">
        <i class="ft-x"></i> {{ $button_cancel }}
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> {{ $button_label }}
    </button>
</div>
