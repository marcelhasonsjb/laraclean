@extends('layouts/contentLayoutMaster')

@section('title', 'Upraviť druh odpadu')

@section('content')

    <form class="form-horizontal" action="{{ url('post/' . $post->id) }}" method="post">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label class="control-label col-lg-2" for="title">Nadpis</label>
            <div class="col-sm-4">
                <input value="{{ $post->title }}" id="title" name="title" placeholder="title"
                       class="form-control input-md" type="text"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2" for="text">text</label>
            <div class="col-sm-4">
                <input value="{{ $post->text }}" id="text" name="text"
                       placeholder="text" class="form-control input-md"
                       type="text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <input id="" name="" type="submit" class="btn btn-success" value="Uložiť task">
                <a class="btn btn-default" href="{{ url('/post') }}">Naspäť</a>
                </br>
            </div>
        </div>
    </form>
@endsection