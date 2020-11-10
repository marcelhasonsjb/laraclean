@extends('layouts.master')

{{--@extends('layouts/contentLayoutMaster')--}}

@section('title', isset($title) ? $title : 'Všetky Tasky')

{{--@section('vendor-style')--}}
    {{--<!-- vendor css files -->--}}
    {{--<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">--}}
    {{--<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">--}}
    {{--<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">--}}
{{--@endsection--}}

{{--@section('page-style')--}}
    {{--<!-- Page css files -->--}}
    {{--<link rel="stylesheet" href="{{ asset(mix('css/pages/app-email.css')) }}">--}}
{{--@endsection--}}
{{--<!-- Sidebar Area -->--}}
{{--@include('post/post-sidebar')--}}


@section('content')




    <div class="app-content-overlay"></div>
    <div class="email-app-area">
        <div class="email-app-list-wrapper">
            <div class="email-app-list">


                <div class="app-fixed-search">
                    <div class="sidebar-toggle d-block d-lg-none"><i class="feather icon-menu"></i></div>
                    <fieldset class="form-group position-relative has-icon-left m-0">
                        <h2>  {{ isset($title) ? $title : 'Všetky Tasky' }}</h2>
                    </fieldset>
                </div>
                </div>

                <div class="email-user-list list-group">
                @forelse( $posts as $post )
                    <ul class="users-list-wrapper media-list">

                            <li class="media">
                            <div class="media-left pr-50">
                                <div class="avatar">
                                    {{--@if(isset($user) && $user->avatar)--}}
                                        <img class="media-object rounded-circle" src="{{ $post->user->avatar['crop'] }}" alt="{{ $post->user->name }}">
                                    {{--<img class="media-object rounded-circle" src="{{ url('/img/users/$post->user->id.''/super-excited-3-tiny.jpg') }}" alt="Generic placeholder image">--}}
                                    {{--@endif--}}
                                </div>
                                {{--<div class="user-action">--}}
                                    {{--<div class="vs-checkbox-con">--}}
                                        {{--<input type="checkbox" >--}}
                                        {{--<span class="vs-checkbox vs-checkbox-sm">--}}
                                        {{--<span class="vs-checkbox--check">--}}
                                          {{--<i class="vs-icon feather icon-check"></i>--}}
                                        {{--</span>--}}
                                      {{--</span>--}}
                                    {{--</div>--}}
                                    {{--<span class="favorite"><i class="feather icon-star"></i></span>--}}
                                {{--</div>--}}
                            </div>
                            <div class="media-body">
                                <div class="user-details">
                                    <div class="mail-items font-size-xsmall">

                                        <div style="display: flex;">
                                            <div class="ml-2 warning">
                                                vytvoril:
                                                <a href="{{ '/user/'. $post->user->id }}" >
                                                <span class="list-group-item-text text-truncate mb-0 ml-1">{{ $post->user->name }}</span>
                                                </a>
                                            </div>
                                            <div class="ml-2 warning">
                                                klient:
                                                <a href="{{ '/'. $post->slug }}">
                                                <span class="list-group-item-text text-truncate mb-0 ml-1">{{ $post->mail_from }}</span>
                                                </a>
                                            </div>
                                            <div class="ml-2 warning">pridelene:
                                            @if ( ($post->tags) )
                                                    @foreach ( $post->tags as $tag )
                                                        <a href="{{ url('tag', $tag->id) }}">
                                                             <span class="list-group-item-text text-truncate mb-0 ml-1">{{ $tag->tag  }}</span>
                                                        </a>
                                                        <small> /</small>
                                                    @endforeach
                                            @endif
                                            </div>
                                            <div class="ml-2 warning">
                                                <?php $i=0; ?>
                                                @if($post->comments)
                                                        @foreach($post->comments as $comment)
                                                            <?php $i++; ?>
                                                        @endforeach
                                                            <a href="{{ '/'. $post->slug }}">
                                                                Komentarov:
                                                                <span class="list-group-item-text text-truncate mb-0 ml-1"><?php echo $i; ?></span>
                                                            </a>
                                                @endif
                                            </div>

                                            <div class="ml-3 warning">
	                                            <?php $f=0; ?>
                                                @if($post->files)
                                            @foreach ( $post->files as $file )
	                                                <?php $f++; ?>
                                            @endforeach
                                                <a href="{{ '/'. $post->slug }}">
                                                    Suborov:
                                                    <span class="list-group-item-text text-truncate mb-0 ml-2"><?php echo $f; ?></span>
                                                    {{--{{ $file->name  }}--}}
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="{{ '/'. $post->slug }}">
                                            <h5 class="list-group-item-heading text-bold-600 mb-25 mt-2">{{ $post->title }}</h5>
                                        </a>
                                    </div>
                                    <div class="mail-meta-item">
                                      <span class="float-right">
                                          <span class=""></span> <span class="mail-date">{{ $post->created_at }}</span>
                                              @if ( ($post->stats) )
                                                  <p class="tags">
                                                       @foreach ( $post->stats as $stat )
                                                           <a href="{{ url('stat', $stat->id) }}" style="background-color: {{ $stat->color }}; display: flex; justify-content: center; " class="btn btn-sm">
                                                                <span style=" color: #ffffff "> {{ $stat->stat  }}</span>
                                                            </a>
                                                       @endforeach
                                                  </p>
                                              @endif
                                      </span>
                                    </div>
                                </div>
                                <a href="{{ '/'. $post->slug }}">
                                <div class="mail-message">
                                    <p class="list-group-item-text mb-0 truncate">{!! char_limiter( $post->text, 150 ) !!}</p>
                                </div>
                                </a>
                            </div>
                        </li>

                    </ul>

                    @empty
                        <p>ziadne tasky</p>
                    @endforelse
                </div>
            {!! $posts->render() !!}
            </div>
        </div>
    </div>

@endsection

{{--@section('vendor-script')--}}
    {{--<!-- vendor js files -->--}}
    {{--<script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>--}}
    {{--<script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>--}}
{{--@endsection--}}
@section('page-script')
    <script>
        $('div.alert').not('.alert').delay(3000).fadeOut(350);
    </script>
    <!-- Page js files -->
    {{--<script src="{{ asset(mix('js/scripts/pages/app-email.js')) }}"></script>--}}
@endsection


