@extends('layouts.app')

@section('content')
    <div class="mt-16">
        <div class="flex gap-2">
            @include('provinsi.partials.add-button')
            @include('provinsi.partials.print-button')
        </div>
        @include('kabupaten.partials.searchable-select')
        @include('kabupaten.partials.table')
    </div>
    @include('kabupaten.partials.crud-modal')
    @include('kabupaten.partials.delete-modal')
    @include('kabupaten.partials.error-modal')
@endsection

@section('scripts')
    @include('kabupaten.partials.scripts')
@endsection