<tr>
    <td>{{ $post->id }}</td>
    <td>{{ $post->user_id }}</td>
    <td><a href="{{ url('post/' . $post->id) }}">{{ $post->title }}</a></td>
    <td>{{ $post->text }}</td>
    <td>{{ $post->slug }}</td>
    <td>{{ $post->created_at }}</td>
    <td>{{ $post->updated_at }}</td>
    <td><a href="{{ url('post/' . $post->id . '/edit') }}" class="btn btn-sm btn-info">upravit</a></td>
    <td><a href="{{ url('post/' . $post->id . '/delete') }}" disabled="" class="btn btn-sm btn-danger delete-notif">zmazat</a></td>
    <td><a href="{{ url('post/' . $post->id . '/delete') }}" disabled="" class="btn btn-sm btn-success">komentovať</a></td>
</tr>
<tr>
    <td>pridelené: <a href="{{ url('post/' . $post->user_id) }}">{{ $post->user_name }}</a></td>
    <td>komentárov: <a href="{{ url('post/' . $post->id) }}">{{ $post->comment_count }}</a></td>
</tr>
