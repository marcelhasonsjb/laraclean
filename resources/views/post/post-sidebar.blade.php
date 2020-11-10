
@section('content-sidebar')
    <div class="sidebar-content email-app-sidebar d-flex">
        <span class="sidebar-close-icon">
            <i class="feather icon-x"></i>
        </span>
        <div class="email-app-menu">
            <div class="form-group form-group-compose text-center compose-btn">

                <a id="editable-sample_new" class="btn btn-primary btn-block my-2" href="{{ url('post/create') }}"> <i class="feather icon-edit"></i> Nový task</a>
            {{--<button type="button" class="btn btn-primary btn-block my-2" data-toggle="modal" data-target="#composeForm"><i class="feather icon-edit"></i> Compose</button>--}}

            </div>
            <div class="sidebar-menu-list">
            <div class="list-group list-group-messages font-medium-1">
                <a href="{{ url('post/') }}" class="list-group-item list-group-item-action border-0 pt-0 active">
                <i class="font-medium-5 feather icon-mail mr-50"></i> Vštekty <span class="badge badge-primary badge-pill float-right"></span></a>
                <a href="{{ url('/user/'. Auth::id()) }}" class="list-group-item list-group-item-action border-0"><i class="font-medium-5 fa fa-paper-plane-o mr-50"></i> Moje</a>
                {{--<a href="{{ url('/role/'. Auth::id()) }}" class="list-group-item list-group-item-action border-0"><i class="font-medium-5 fa fa-paper-plane-o mr-50"></i> client</a>--}}
                {{--<a href="#" class="list-group-item list-group-item-action border-0"><i--}}
                    {{--class="font-medium-5 feather icon-edit-2 mr-50"></i> Draft <span--}}
                    {{--class="badge badge-warning badge-pill float-right">4</span> </a>--}}
                {{--<a href="#" class="list-group-item list-group-item-action border-0"><i class="font-medium-5 feather icon-star mr-50"></i>--}}
                {{--Starred</a>--}}
                {{--<a href="#" class="list-group-item list-group-item-action border-0"><i class="font-medium-5 feather icon-info mr-50"></i>--}}
                {{--Spam <span class="badge badge-danger badge-pill float-right">3</span> </a>--}}
                {{--<a href="#" class="list-group-item list-group-item-action border-0"><i class="font-medium-5 feather icon-trash mr-50"></i>--}}
                {{--Trash</a>--}}
            </div>
            <hr>
            {{--<h5 class="my-2 pt-25">Labels</h5>--}}
            <div class="list-group list-group-labels font-medium-1">

                <a href="#" class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                    class="bullet bullet-success mr-1"></span> Prijaté</a>
                <a href="#" class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                    class="bullet bullet-primary mr-1"></span> Pridelené</a>
                <a href="#" class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                    class="bullet bullet-warning mr-1"></span> Čaká na klienta</a>
                <a href="#" class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                    class="bullet bullet-danger mr-1"></span> Ukončené</a>
            </div>
                <div class="list-group list-group-labels font-medium-1">
                <hr>
                {{--@foreach( $tags as $tag)--}}
                    {{--<a href="{{ '/tag/'.$tag->id }}" class="list-group-item list-group-item-action border-0 d-flex align-items-center"> {{ $tag->tag }}</a>--}}
                {{--@endforeach--}}
            </div>
            </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade text-left" id="composeForm" tabindex="-1" role="dialog" aria-labelledby="emailCompose"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-text-bold-600" id="emailCompose">3New Message</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-1">
                <div class="form-label-group mt-1">
                <input type="text" id="emailTo" class="form-control" placeholder="To" name="fname-floating">
                <label for="emailTo">To</label>
                </div>
                <div class="form-label-group">
                <input type="text" id="emailSubject" class="form-control" placeholder="Subject" name="fname-floating">
                <label for="emailSubject">Subject</label>
                </div>
                <div class="form-label-group">
                <input type="text" id="emailCC" class="form-control" placeholder="CC" name="fname-floating">
                <label for="emailCC">CC</label>
                </div>
                <div class="form-label-group">
                <input type="text" id="emailBCC" class="form-control" placeholder="BCC" name="fname-floating">
                <label for="emailBCC">BCC</label>
                </div>
                <div id="email-container">
                <div class="editor" data-placeholder="Message">
                </div>
                </div>
                <div class="form-group mt-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="emailAttach">
                    <label class="custom-file-label" for="emailAttach">Attach file</label>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Send" class="btn btn-primary">
                <input type="Reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
            </div>
            </div>
        </div>
    </div>
@endsection
