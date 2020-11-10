<?php

$selected = false;
if ( isset($user) ) $selected = $user->id;
elseif ( isset($posts) ) $selected = $posts->user_id;

?>

<?php $dir_model = new \App\User; ?>


<!-- Text input-->
{{--<div class="form-group">--}}
{{--<label class="control-label col-lg-2" for="druh">Druh</label>--}}
{{--<div class="col-sm-2">--}}

{{--<select class="form-control m-bot15" id="" name="druh_id" onchange="{{ $submit ? 'this.form.submit()' : '' }}">--}}
{{--<option value="">-----</option>--}}
@foreach( $dir_model->getUsers() as $user )
    <option {{ $selected === $user->id ? 'selected' : '' }}
            value="{{ $user->id }}">{{ $user->name }}</option>
@endforeach
{{--</select>--}}

{{--</div>--}}
{{--</div>--}}
