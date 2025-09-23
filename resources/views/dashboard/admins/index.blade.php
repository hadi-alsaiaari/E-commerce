@extends('layouts.dashboard.app')

@section('title', __('words.admins'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('words.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('words.admins') }}</li>
@endsection

@section('content')
    <div class="content-body">
        <div class="card-content">
            <div class="card-body">
                <a href="{{ route('dashboard.admins.create') }}" class="btn bg-success round black">{{ __('words.add') }}</a>
                <input type="text" id="live-search" class="form-control" autofocus>
                <br>
                <br>
                <table class="table table-responsive-sm black table-hover">
                    <thead class="bg-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('words.name') }}</th>
                            <th scope="col">{{ __('words.email') }} </th>
                            <th scope="col">{{ __('words.role') }} </th>
                            <th scope="col">{{ __('words.status') }} </th>
                            <th scope="col">{{ __('words.created_at') }} </th>
                            <th scope="col">{{ __('words.operations') }} </th>
                        </tr>
                    </thead>
                    <tbody class="bg-teal bg-lighten-3 users-list">
                        @forelse ($admins as $admin)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $admin->name }} </td>
                                <td>{{ $admin->email }} </td>
                                <td>{{ $admin->role->role }} </td>
                                <td>{{ $admin->getStatus() }} </td>
                                <td>{{ $admin->created_at->format('Y-m-d') }}</td>
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
                                                href="{{ route('dashboard.admins.edit', ['admin' => $admin->id, 'page' => request()->page]) }}">
                                                <i class="la la-edit bg-teal bg-lighten-3"></i>
                                                {{ __('words.edit') }}
                                            </a>

                                            <div class="dropdown-divider bg-teal bg-lighten-3"></div>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                                onclick="document.getElementById('change-form-{{ $admin->id }}').submit();">
                                                <i
                                                    class="la @if ($admin->status) la-toggle-on @else la-toggle-off @endif bg-teal bg-lighten-3"></i>
                                                @if ($admin->status)
                                                    {{ __('words.suspension') }}
                                                @else
                                                    {{ __('words.activation') }}
                                                @endif
                                            </a>

                                            <div class="dropdown-divider bg-teal bg-lighten-3"></div>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                                onclick="if(confirm('{{ __('words.sure_delete') }}')){document.getElementById('delete-form-{{ $admin->id }}').submit();} return false">
                                                <i class="la la-trash bg-teal bg-lighten-3"></i>
                                                {{ __('words.delete') }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <form id="delete-form-{{ $admin->id }}"
                                action="{{ route('dashboard.admins.destroy', $admin->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                            <form id="change-form-{{ $admin->id }}"
                                action="{{ route('dashboard.admins.status', $admin->id) }}" method="post">
                                @csrf
                            </form>
                        @empty
                            <td colspan="7">{{ __('words.no_data') }}</td>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $admins->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const liveSearch = document.getElementById('live-search');
            const tableBody = document.querySelector('.users-list');

            liveSearch.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    // الأعمدة التي نريد البحث فيها: الاسم (2) والبريد (3) والوظيفة (4)
                    const nameCell = row.querySelector('td:nth-child(2)');
                    const emailCell = row.querySelector('td:nth-child(3)');
                    const roleCell = row.querySelector('td:nth-child(4)');

                    const nameText = nameCell ? nameCell.textContent.toLowerCase() : '';
                    // const emailText = emailCell ? emailCell.textContent.toLowerCase() : '';
                    const roleText = roleCell ? roleCell.textContent.toLowerCase() : '';

                    if (nameText.includes(searchTerm) || emailText.includes(searchTerm) || roleText.includes(searchTerm) || searchTerm === '') {
                        // row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endpush
