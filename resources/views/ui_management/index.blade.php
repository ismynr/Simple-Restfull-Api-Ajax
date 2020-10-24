@extends('layout.app')

@section('title', 'User UI')

@section('content')
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="container">
            <h3 class="float-left">Table Data</h3>
            <button type="button" class="addBtn btn btn-primary btn-sm float-right">Create</button>
        </div>
        <div id="table_wrapper" class="mt-3" style="width:100%" >
            <table id="table" class="table table-sm data-table">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
        
    </div>
</div>    
@endsection

@section('modals')
    @include('ui_management.modal')
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

    @include('ui_management.JS')
@endpush
