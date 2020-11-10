@extends('layouts.master')

@section('content')

<div class="title m-b-md">
    {{ $title }}
</div>
<ul>
    @foreach( $posts as $post )
        <li>{{ $post }}</li>
    @endforeach
</ul>

@endsection