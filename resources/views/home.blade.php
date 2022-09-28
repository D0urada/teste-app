@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-2">
                    <p class="text-center mh-100">
                        {{ __('Dashboard') }}
                    </p>
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#register-modal">
                        Cadastrar Sala
                    </button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            @php
                                Session::forget('success');
                            @endphp

                        </div>
                    @endif

                    @include('app/rooms')
                </div>
            </div>
        </div>
    </div>
    @include('app/register-modal')
    @include('app/reserve-modal')
</div>
@endsection
