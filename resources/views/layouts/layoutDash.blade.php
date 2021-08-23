@extends('Layouts.layout')

@section('css')

@endsection

@section('Content')


@endsection

@section('JsFooter')
    @include('Includes.sweetalert-response')
    @yield('jsFooter')
    @yield('jsFooterModal')
    <!-- END PAGE LEVEL JS-->
@endsection
