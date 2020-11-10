@extends('layouts.master')


@section('title', $post->title)

@section('content')

    <section class="box">
        <article class="post full-post">

            <header class="post-header d-flex justify-content-between align-items-center">
                <article class="d-flex justify-content-sm-around">
                <h1 class="box-heading">
                    <a href="{{ route('post.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                </h1>
                </article>
                  <article class="d-flex justify-content-center">
                      @can('edit-post', $post)
                    @endcan

                    <time datetime="{{ $post->datetime }}">
                        <small class="font-italic h6 mr-2">{{ $post->created_at }}</small>
                    </time>
                          <small>
                              @if ( ($post->stats) )
                                  <p class="tags">
                                      @foreach ( $post->stats as $stat )
                                          <a href="{{ url('stat', $stat->id) }}" style="background-color: {{ $stat->color }}; display: flex; justify-content: center; " class="btn btn-sm">
                                              <span style=" color: #ffffff "> {{ $stat->stat  }}</span>
                                          </a>
                                      @endforeach
                                  </p>
                              @endif
                          </small>
                                      </article>
                <article class="d-flex justify-content-end">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-warning btn-sm edit-link mr-1">edit</a>
                    <a href="{{ route('post.delete', $post->id) }}" class="btn btn-outline-danger btn-sm edit-link">delete</a>
                </article>

            </header>



            <div class="post-content">
                {!! $post->rich_text !!}

                <p class="written-by font-italic">
                    <small>- task vytvoril
                        <a href="{{ url('user', $post->user_id) }}">{{ $post->user->email }}</a>
                    </small>


                </p>
            </div>

            <footer class="post-footer">
                <div class="d-flex justify-content-between align-items-center">
                <div>@include('partials.files')</div>
                <div>@include('partials.tags')</div>
                </div>
                <div>@include('partials.discussion')</div>
            </footer>

        </article>
    </section>

@endsection