@if ( Auth::check() )
    <nav class="navigation">
        <div class="btn-group btn-group-sm pull-left">
            <a href="{{ url('/') }}" class="btn btn-default"> all tasks </a>
            <a href="{{ url('user/' . Auth::id()) }}" class="btn btn-default"> my tasks </a>
            <a href="{{ route('post.create') }}" class="btn btn-default"> add new </a>
            <a href="{{ url('client/') }}" class="btn btn-default"> maily </a>
        </div>
        <div class="btn-group btn-group-sm pull-right">
            <a href="{{ route('user.edit', Auth::id()) }}" class="btn btn-default">
                {{ Auth::user()->email }}
            </a>
            <a href="{{ url('auth/logout') }}" class="btn btn-default logout">logout</a>
        </div>
    </nav>
@endif