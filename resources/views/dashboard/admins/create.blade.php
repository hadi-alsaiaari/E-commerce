@extends('layouts.dashboard.app')

@section('title', __('words.create_admin'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('words.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.admins.index') }}">{{ __('words.admins') }}</a></li>
    <li class="breadcrumb-item active">{{ __('words.create_admin') }}</li>
@endsection

@section('content')
    <div class="content-body">
        <section id="form-action-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="from-actions-multiple"><i class="ft-clipboard"></i>
                                {{ __('words.create_admin') }}</h4>
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
                                <form class="form" action="{{ route('dashboard.admins.store') }}" method="POST">
                                    @csrf
                                    @include('dashboard.admins._form', [
                                        'button_label' => __('words.save'),
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
