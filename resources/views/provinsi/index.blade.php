@extends('layouts.app')

@section('content')
    <div class="relative overflow-x-auto sm:rounded-lg mt-16">
        <div class="flex gap-2">
            @include('provinsi.partials.add-button')
            @include('provinsi.partials.print-button')
        </div>
     
        @include('provinsi.partials.table')
    </div>
    @include('provinsi.partials.crud-modal')
    @include('provinsi.partials.delete-modal')
    @include('provinsi.partials.error-modal')
@endsection

@section('scripts')
    @include('provinsi.partials.scripts')
@endsection