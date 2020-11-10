@if ( $post->files )

    <p class="files">
        @foreach ( $post->files as $file )
            <a href="{{ url('download', $file->id) }}" class="btn btn-success btn-sm">
                {{ $file->name  }}
            </a>
        @endforeach
    </p>

@endif