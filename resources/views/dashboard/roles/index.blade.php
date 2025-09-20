@extends('layouts.dashboard.app')

@section('title', __('words.roles'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('words.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('words.roles') }}</li>
@endsection

@section('content')
    <div class="content-body">
        <div class="card-content">
            <div class="card-body">
                <a href="{{ route('dashboard.roles.create') }}" class="btn bg-success round black">{{ __('words.add') }}</a>
                <br>
                <br>
                <table class="table table-responsive-sm black table-hover">
                    <thead class="bg-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('words.role_name') }}</th>
                            <th scope="col">{{ __('words.permissions') }} </th>
                            <th scope="col">{{ __('words.operations') }} </th>
                        </tr>
                    </thead>
                    <tbody class="bg-teal bg-lighten-3">
                        @forelse ($roles as $role)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $role->role }} </td>
                                <td>
                                    @if ($role->permissions == -1)
                                        {{__('words.all_permissions')}}
                                    @else
                                        @foreach (app('permissions') as $key => $value)
                                            @if ($role->permissions & $key)
                                                {{ $value }},
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown float-md-left">
                                        <button class="btn bg-success dropdown-toggle round btn-glow px-2"
                                            id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{ __('words.operations') }}
                                        </button>
                                        <div class="dropdown-menu bg-teal bg-lighten-3"
                                            aria-labelledby="dropdownBreadcrumbButton" class="bg-teal bg-lighten-3">
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.roles.edit', ['role' => $role->id, 'page' => request()->page]) }}">
                                                <i class="la la-edit bg-teal bg-lighten-3"></i>
                                                {{ __('words.edit') }}
                                            </a>

                                            <div class="dropdown-divider bg-teal bg-lighten-3"></div><a
                                                class="dropdown-item" href="javascript:void(0)"
                                                onclick="if(confirm('{{ __('words.sure_delete') }}')){document.getElementById('delete-form-{{ $role->id }}').submit();} return false">
                                                <i class="la la-trash bg-teal bg-lighten-3"></i>
                                                {{ __('words.delete') }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <form id="delete-form-{{ $role->id }}"
                                action="{{ route('dashboard.roles.destroy', $role->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        @empty
                            <td colspan="4">{{ __('words.no_data') }}</td>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $roles->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
