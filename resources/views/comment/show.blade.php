@extends('layouts/contentLayoutMaster')

@section('title', '')

@section('content')
    <table class="table table-striped table-hover table-bordered" id="editable-sample">
        <thead>
        <tr>
            <th>id</th>
            <th>user_id</th>
            <th>title</th>
            <th>text</th>
            <th>slug</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>-</th>
            <th>-</th>
        </tr>
        </thead>
        <tbody>
        @include('partials.post')
        </tbody>
        <tfoot>
        <tr class="summary">
        </tr>
        </tfoot>
    </table>
@endsection