@extends('layouts.frontend.app')

@section('title', 'Verificar')

@push('css')

    <link href="{{ asset('assets/frontend/css/auth/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/auth/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/auth/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/auth/ionicons.css') }}" rel="stylesheet">


@endpush

@section('content')


    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>RECUPERAÇÃO</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                <div class="col-lg-2 col-md-0"></div>
                <div class="col-lg-8 col-md-12">
                    <div class="post-wrapper">

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                                    <div class="card-body">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif

                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- post-wrapper -->
                </div><!-- col-sm-8 col-sm-offset-2 -->
            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->

    @push('js')

        <!-- SCIPTS -->

        <script src="{{ asset('assets/frontend/js/auth/jquery-3.1.1.min.js') }}"></script>

        <script src="{{ asset('assets/frontend/js/auth/tether.min.js') }}"></script>

        <script src="{{ asset('assets/frontend/js/auth/bootstrap.js') }}"></script>

        <script src="{{ asset('assets/frontend/js/auth/scripts.js') }}"></script>

    @endpush

@endsection
