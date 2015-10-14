@extends('layouts.default')

@section('content')
    <div class="row" style="width:100%;max-width:960px;margin:0 auto;border:1px solid #c9cfdd;border-radius:10px;margin-bottom:10px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Employees<div style="display:inline;float:right;margin-top:-11px;margin-right:-16px"><a href="#" data-target="#addUser" class="btn btn-success btn-mini"><i class="icon-white icon-plus"></i>+</a></div></h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><a  onclick="getDetails({{ $user->id }})"> {{ $user->email }} </td>
                        </tr>
                    @endforeach
                </table>
                {!! $users->render() !!}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUser" >
        <div class="modal-dialog" role="document" style=" width: 50%;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Users<div style="display:inline;float:right;margin-top:-11px;margin-right:-16px"></h3>
                </div>

                <div class="modal-body">
                    <label>Name</label><input type="text" id="name">
                    <label>Email</label><input type="text" id="email">
                    <label>Password</label><input type="text" id="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style=" width: 50%;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Employees<div style="display:inline;float:right;margin-top:-11px;margin-right:-16px"></h3>
                </div>

                <div class="modal-body">
                    <!-- Content goes here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        function getEmployee(id){
// Display a ajax modal, with a title
            eModal.ajax('http://homestead.app/employees/get/'+id, 'Employee Details')
                    .then(ajaxOnLoadCallback);
        }

        function getDetails(id) {
            $('#myModal').modal('toggle')
            //Delete current data
            $(".modal-body").text('');
            //Fetch data
            $.getJSON( "/employees/get/"+id, function( data ) {
                var items = [];
                $.each( data, function( key, val ) {
                    //Add line of data to modal window
                    $(".modal-body").append("<tr><td align='left' width='150'><strong>"+key+"</strong></td><td>"+val+"</td></tr>");
                });
            });
        };
    </script>
@stop