@extends('layouts/contentLayoutMaster')

@section('title', isset($title) ? $title : 'Posts')

@section('vendor-style')
    {{--<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a id="editable-sample_new" class="btn btn-primary" href="{{ url('comment/create') }}">Pridať nový komentár
                <i class="fa fa-plus"></i></a>
        </div>
    </div>

    </br>

    <section id="basic-datatable">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>user_id</th>
                                        <th>post_id</th>
                                        <th>text</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @each( 'partials.comment', $comment, 'comment' )
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    {{-- vednor files --}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>--}}
@endsection
@section('myscript')
    {{-- Page js files --}}
    {{--<script src="{{ asset(mix('js/scripts/datatables/datatable.js')) }}"></script>--}}
@endsection
