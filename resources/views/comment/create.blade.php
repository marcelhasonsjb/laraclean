@extends('layouts/contentLayoutMaster')

@section('title', 'Novy task')

@section('content')

    <form class="form-horizontal" action="{{ url('post') }}" method="post">
        @csrf
        <div class="form-group">
            <label class="control-label col-lg-2" for="title">Nadpis</label>
            <div class="col-sm-4">
                <input id="title" name="title" placeholder="title" class="form-control input-md" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2" for="popis">text</label>
            <div class="col-sm-4">
                <input id="text" name="text" placeholder="text" class="form-control input-md" type="text"/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="location">
                    Prideliť task:
                </label>
                <select class="select2 form-control" id="" name="user_task_id">
                    @include('partials.selectUser', [ 'submit' => false ])
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <input id="" name="" type="submit" class="btn btn-success" value="Pridať task">
                <a class="btn btn-default" href="{{ url('/post') }}">Naspäť</a>
                </br>
            </div>
        </div>
    </form>
@endsection