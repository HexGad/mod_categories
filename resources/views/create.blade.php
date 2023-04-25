@extends('dashboard.layouts.base')
@section('toolbar')
    @include('dashboard.layouts.components.toolbar',[
        'title' => 'Create New Category',
        'breadcrumbs' => [
            ['title'=> 'Home', 'url' => url('/dashboard/')],
            ['title'=> 'Categories', 'url' => route('dashboard.categories.index')],
            ['title'=> 'Create Category']
        ]
    ])
@endsection

@push('styles')
    {{ module_vite('categories', 'resources/assets/sass/app.scss') }}
@endpush

@section('content')
    <div id="app">
        <create-category />
    </div>
@endsection

@push('scripts')
    {{ module_vite('categories', 'resources/assets/js/app.js') }}
@endpush
