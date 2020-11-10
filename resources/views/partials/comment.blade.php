<li>
    <div class="d-inline-flex">
    <img class="round" src="{{ $comment->user->avatar['crop'] }}" alt="{{ $comment->user->name }}" height="40" width="40">
    <div class="d-flex flex-wrap flex-md-column ml-2">
        <header>
        <a href="{{ url('user', $comment->user->id) }}">
            <strong>{{ $comment->user->name }}</strong>
        </a>
        <small>{{ $comment->created_at }}</small>
    </header>
    <p>
        {!! $comment->text !!}
    </p>
    </div>
    </div>
        <hr>
</li>