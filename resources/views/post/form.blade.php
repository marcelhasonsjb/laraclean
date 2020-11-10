<header class="post-header">
    <h1 class="box-heading">{{ $title }}</h1> {{-- Text Field --}}
</header>
{{--<div class="form-group">--}}
    {{--Aktuálny status tasku: {!! Form::select('status', array('1' => 'Prijatý', '2' => 'Pridelený', '3' => 'Čaká na klienta', '4' => 'Ukončený', '5' => 'Zrušený'), $post->status  ?? '', ['class' => 'btn btn-dark dropdown-toggle']); !!}--}}
{{--</div>--}}


<div class="form-group">
    @foreach( $stats as $stat)
        <label class="checkbox" style="margin-left: 25px">
            {!! Form::radio('stats[id]', $stat->id, in_array($stat->id, $post->stats->pluck('id')->toArray() )) !!}
            {{ $stat->stat }}
        </label>
    @endforeach
</div>
{{-- Title Field --}}
<div class="form-group">
    {!! Form::text('mail_from', null, ['class' => 'form-control', 'placeholder' => 'email@klienta.sk']) !!}
</div>
<div class="form-group">
    {!! Form::hidden('mail_date', now()->format('Y-m-d H:i:s' ) ) !!}
</div>

{{-- Title Field --}}
<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'názov tasku']) !!}
</div>

{{-- Text Field --}}
<div class="form-group">
    {!! Form::textarea('text', null, ['class' => 'form-control', 'rows' => 10, 'placeholder' => 'text tasku']) !!}
</div>

{{-- Files Field --}}
@if( isset($post) && $post->files )
    <ul class="list-group">
        @foreach( $post->files as $file )
            <li class="list-group-item disabled">{{ $file->name }}</li>
        @endforeach
    </ul>
@endif

{{-- Add New Files Field --}}
<div class="form-group add-files">
    {!! Form::file('items[]', ['class' => 'form-control']) !!}
    <a class="btn btn-default btn-xs pull-right">další súbor</a>
</div>

{{-- Tags Field --}}
<div class="form-group">
    @foreach( $tags as $tag)
        <label class="checkbox" style="margin-left: 25px">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->tag }}
        </label>
    @endforeach
</div>

{{-- Add post Field --}}
<div class="form-group">
    {!! Form::button('Uložiť '.$title, ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
</div>
    <span class="alebo ">
		or {!! link_back('cancel') !!}
	</span>
