@php
/*
$layout_page = shop_home
*/ 
@endphp

@extends($templatePath.'.layout')
@php
$productsNew = $modelProduct->start()->getProductLatest()->setlimit(8)->getData();
$productsHot = $modelProduct->start()->getProductHot()->getData();
$productsBuild = $modelProduct->start()->getProductBuild()->getData();
$productsGroup = $modelProduct->start()->getProductGroup()->getData();
@endphp

@section('center')

    @include($templatePath.'.screen.shop_home_featured')
    {{-- @include($templatePath.'.screen.shop_home_hot') --}}

@endsection

@push('styles')
@endpush

@push('scripts')

@endpush
