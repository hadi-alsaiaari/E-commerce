@extends('layouts.dashboard.app')

@section('title', __('words.edit_role'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('words.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.roles.index') }}">{{ __('words.roles') }}</a></li>
    <li class="breadcrumb-item active">{{ __('words.edit_role') }}</li>
@endsection

@section('content')
    <div class="content-body">
        <section id="form-action-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="from-actions-multiple"><i class="ft-clipboard"></i>
                                {{ __('words.edit_role') }}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('dashboard.roles.update', $role->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    @include('dashboard.roles._form', [
                                        'button_label' => __('words.edit'),
                                        'button_cancel' => __('words.cancel'),
                                    ])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all-permissions');
            const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            // عند تغيير حالة "اختيار الكل"
            selectAllCheckbox.addEventListener('change', function() {
                permissionCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });

                // إذا تم اختيار الكل، أضف قيمة خاصة للإشارة إلى ذلك
                if (this.checked) {
                    addSelectAllValue();
                }
            });

            // عند تغيير أي checkbox فردي
            permissionCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateSelectAllCheckbox();
                });
            });

            // تحديث حالة "اختيار الكل" بناءً على الصلاحيات المختارة
            function updateSelectAllCheckbox() {
                const allChecked = Array.from(permissionCheckboxes).every(checkbox => checkbox.checked);

                selectAllCheckbox.checked = allChecked;
            }

            // إضافة قيمة خاصة عندما يتم اختيار الكل
            function addSelectAllValue() {
                // يمكنك إضافة قيمة مخفية للإشارة إلى أن الكل مختار
                let hiddenInput = document.querySelector('input[name="select_all"]');
                if (!hiddenInput) {
                    hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'select_all';
                    hiddenInput.value = '1';
                    document.querySelector('form').appendChild(hiddenInput);
                }
            }

            // التهيئة الأولية
            updateSelectAllCheckbox();

            // إذا كانت جميع الصلاحيات مختارة مسبقاً (قيمة -1)
            @if ($role->permissions == -1)
                selectAllCheckbox.checked = true;
                permissionCheckboxes.forEach(checkbox => {
                    checkbox.checked = true;
                });
            @endif
        });
    </script>
@endpush
