@extends('layouts.default')

@section('content')
    <div class="row" style="width:100%;max-width:960px;margin:0 auto;border-radius:10px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Employees<div style="display:inline;float:right;">
                        <a href="#" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span>   </a>
                    </div>
                </h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>EmployeeID</th>
                        <th>Name</th>
                    </tr>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->EmployeeID }}</td>
                            <td><a  onclick="getEmployee({{ $employee->EmployeeID }})"> {{ $employee->FirstName }} {{ $employee->LastName}}</a></td>
                        </tr>
                    @endforeach
                </table>
                {!! $employees->render() !!}
            </div>
        </div>
    </div>


    <!-- Show Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style=" width: 40%;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="showHeader">
                        <!-- Content goes here refer tp JS function getEmployee -->
                    </div>
                </div>
                <div class="modal-body" align="center">
                    <table border="1">
                        <!-- Content goes here refer tp JS function getEmployee -->
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style=" width: 40%;">
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <h3 class="panel-title">Edit Employee<div style="display:inline;float:right;">

                    </h3>
                </div>
                <div class="modal-body" align="center">
                    <table border="1">
                        <!-- Content goes here refer tp JS function editEmployee -->
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="dialog2" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Dialog 2</h4>
                </div>
                <div class="modal-body">This is the second modal dialog</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

<script>

    // Display employee details
    function getEmployee(id) {
        //Select show modal
        $('#showModal').modal('toggle')

        //Delete current data
        $(".panel-heading-show").text('');
        $(".modal-body").text('');

        //Fetch data
        $.getJSON( "/employees/get/"+id, function( data ) {

            console.log(data);
            <!-- Header content -->
            $(".showHeader").text("Employee Details - "+data.FirstName+" "+data.LastName);
            str = "<div style='float:right'>";
            str +=  "<a href='#' onclick='editEmployee({{ $employee->EmployeeID }})' class='btn btn-xs btn-warning'><span class='glyphicon glyphicon-edit'></span></a>";
            str += "&nbsp&nbsp<a href='#' class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span></a></div>";
            $(".showHeader").append(str);

            $.each( data, function( key, val ) {
                <!-- Content goes here -->
                $(".modal-body").append("<tr><td align='left' width='150'><strong>"+key+"</strong></td><td style='padding:5px' align='left'>"+val+"</td></tr>");
            });
        });

    };


    // Edit employee
    function editEmployee(id) {
        $("#showModal").removeClass("fade").modal("hide");
        $('#editModal').modal('toggle')
        //Delete current data
        $(".modal-body").text('');
        //Fetch data
        $.getJSON( "/employees/get/"+id, function( data ) {
            var items = [];
            $.each( data, function( key, val ) {
                //Add line of data to modal window
                console.log(key);
                    $(".modal-body").append("<tr><td align='left'><strong>"+key+"</strong></td><td align='left' ><input type='text' style='width:400px;margin-right:150px' value='"+val+"'></td></tr>");
            });
        });
    };



</script>
@stop