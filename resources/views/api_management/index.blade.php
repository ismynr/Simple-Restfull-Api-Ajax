@extends('layout.app')

@section('title', 'User UI')

@section('content')
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="container">
            <h3 class="float-left">Api Response & Endpoint</h3>
        </div>
        <div id="table_wrapper" class="mt-3" style="width:100%" >
            <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-index-tab" data-toggle="pill" href="#v-pills-index" role="tab" aria-controls="v-pills-index" aria-selected="true">Show All</a>
                    <a class="nav-link" id="v-pills-create-tab" data-toggle="pill" href="#v-pills-create" role="tab" aria-controls="v-pills-create" aria-selected="false">Create</a>
                    <a class="nav-link" id="v-pills-show-tab" data-toggle="pill" href="#v-pills-show" role="tab" aria-controls="v-pills-show" aria-selected="false">Show</a>
                    <a class="nav-link" id="v-pills-update-tab" data-toggle="pill" href="#v-pills-update" role="tab" aria-controls="v-pills-update" aria-selected="false">Update</a>
                    <a class="nav-link" id="v-pills-delete-tab" data-toggle="pill" href="#v-pills-delete" role="tab" aria-controls="v-pills-delete" aria-selected="false">Delete</a>
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-index" role="tabpanel" aria-labelledby="v-pills-index-tab">
                        <input class="form-control" disabled value="{{url("/api/users")}}"></input><br>
                        <div id="content-index"><pre></pre></div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-create" role="tabpanel" aria-labelledby="v-pills-create-tab">
                        <div class="form-group"><input disabled class="form-control" value="{{url("/api/users")}}"></input></div>
                        <form id="create_form">
                            <div class="form-group"><input type="text" class="form-control" placeholder="name" name="name"></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="email" name="email"></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="password" name="password"></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="password confirmation" name="password_confirmation"></div>
                            <button type="submit" id="store_button" class="btn btn-primary" >Store</button>
                        </form>
                        <div id="content-create"><pre></pre></div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-show" role="tabpanel" aria-labelledby="v-pills-show-tab">
                        <form id="show_form">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group"><input disabled class="form-control" value="{{url("/api/users")}}/"></input></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group"><input class="form-control" placeholder="{id}" name="id_show_input"></input></div>
                                </div>
                            </div>
                            <button type="submit" id="show_button" class="btn btn-primary" >Show By ID</button>
                        </form>
                        <div id="content-show"><pre></pre></div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-update" role="tabpanel" aria-labelledby="v-pills-update-tab">
                        <form id="update_form">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group"><input disabled class="form-control" value="{{url("/api/users")}}/"></input></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group"><input class="form-control" placeholder="{id}" name="id_update_input"></input></div>
                                </div>
                            </div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="name" name="name"></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="email" name="email"></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="password" name="password"></div>
                            <div class="form-group"><input type="text" class="form-control" placeholder="password confirmation" name="password_confirmation"></div>
                            <button type="submit" id="update_button" class="btn btn-primary" >Update</button>
                        </form>
                        <div id="content-update"><pre></pre></div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab">
                        <form id="delete_form">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group"><input disabled class="form-control" value="{{url("/api/users")}}/"></input></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group"><input class="form-control" placeholder="{id}" name="id_delete_input"></input></div>
                                </div>
                            </div>
                            <button type="submit" id="delete_button" class="btn btn-primary" >Delete</button>
                        </form>
                        <div id="content-delete"><pre></pre></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        
    </div>
</div>    
@endsection

@push('script')
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
        });
    </script>

    @include('api_management.JS')
@endpush
