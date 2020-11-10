@extends('layouts.master')

@section('title', $title)


@section('content')
    <section class="box">
        {!! Form::model($post, ['route' => [ 'post.update', $post->id ], 'method' => 'put', 'files' => true, 'files' => true, 'class' => 'post', 'id' => 'edit-form']) !!}

        @include('post.form')

        {!! Form::close() !!}
    </section>


@endsection