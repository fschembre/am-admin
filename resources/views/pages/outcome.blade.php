@extends('layouts.default')
@section('content')
    <div class="row" style="width:100%;max-width:960px;margin:0 auto;border-radius:10px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Outcome<div style="display:inline;float:right;">
                        <a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span>   </a>
                    </div>
                </h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Document</th>
                    </tr>
                    @foreach ($outcome as $row)
                        <tr>
                            <td>{{ date('F d, Y', strtotime($row->created_at)) }}</td>
                            <td><a href="#" onclick="editOutcome({{ $row->id  }})">{{ $row->note }}</a></td>
                            <td align="right">{{ $row->amount }}</td>
                            <td>{{ $row->document }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style=" width: 25%;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Outcome</h3>
                </div>
                <div class="modal-body" align="center">

                    {!! Form::open(['url' => 'outcome']) !!}
                    <div class="form-group" >
                        {!! Form::label('Type', 'Type:') !!}
                        <div style="width:100%">
                            <select class="form-control" id="type" name="type" onchange="fillType(this.options[this.selectedIndex].text)" >
                                <option value=0 selected>--Select type--</option>
                                <option value=1>Food</option>
                                <option value=2>Rent</option>
                                <option value=3>Gas</option>
                                <option value=4>Electricity</option>
                                <option value=5>Telephone</option>
                                <option value=6>Internet</option>
                                <option value=7>Council Tax</option>
                                <option value=8>Car</option>
                                <option value=9>Water</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Month', 'Month:') !!}
                        <select class="form-control" id="month" name="month" onchange="fillMonth(this.options[this.selectedIndex].text)" >
                            <option value=''>--Select Month--</option>
                            <option value='1'>January</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Amount', 'Amount:') !!}
                        {!! Form::text('amount',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Description', 'Description:') !!}
                        {!! Form::text('note',null,['class'=>'form-control', 'id' => 'note']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Document', 'Document:') !!}
                        <div style="border:1px solid #c9cfdd;border-radius:3px;height:33px">
                            {!! Form::file('document',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style=" width: 25%;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Outcome</h3>
                </div>
                <div class="modal-body" align="center">
                    {!! Form::open(['url' => 'outcome']) !!}
                    <div id="editContent">

                    </div>
                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function fillType($val) {
                $('#note').val($val);
        }

        function fillMonth($val) {
            var input = $( "#note" );
            input.val( input.val() + " - " + $val + " "  + (new Date).getFullYear());
        }

        // Edit outcome
        function editOutcome(id) {

            var type, month;
            var items = [];
            typeArr = {0: '--Select type--', 1 :'Food' , 2:'Rent', 3:'Gas', 4:'Electricity', 5:'Telephone', 6:'Internet', 7: 'Council Tax', 8:'Car', 9:'Water' };
            monthArr = {0: '--Select month--', 1 :'January' , 2:'February', 3:'March', 4:'April', 5:'May', 6:'June', 7: 'July', 8:'August', 9:'Septmber', 10:'October', 11:'November', 12:'December' };

            $('#editModal').modal('toggle')
            //Delete current data
            $("#editContent").text('');
            //Fetch data
            $.getJSON( "/outcome/get/"+id, function( data ) {
                $.each( data, function( key, val ) {
                    items[key] = val;
                });

                //Print Type dropbox
                $("#editContent").append( "<div class='form-group' style='display:inline'><label for='Type'>Type:</label>");
                type = "<div style='width:100%'><select class='form-control' id='type' onchange='fillType(this.options[this.selectedIndex].text)' >";
                $.each(typeArr,function(i, value){
                    if (items['type'] == i)
                        type += "<option value='"+i+"' selected>"+value+"</option>";
                    else
                        type += "<option value='"+i+"'>"+value+"</option>";
                });
                type += "</select></div> ";
                $("#editContent").append(type);

                //Print Month dropbox
                $("#editContent").append( "<div class='form-group' style='display:inline'><label for='Month'>Month:</label>");
                month = "<div style='width:100%'><select class='form-control' id='type' onchange='fillMonth(this.options[this.selectedIndex].text)' >";
                $.each(monthArr,function(i, value){
                    if (items['month'] == i)
                        month += "<option value='"+i+"' selected>"+value+"</option>";
                    else
                        month += "<option value='"+i+"'>"+value+"</option>";
                });
                type += "</select></div> ";
                $("#editContent").append(month);

                $("#editContent").append( "<div class='form-group'><label for='Amount'>Amount:</label><input class='form-control' type='text' value='"+items['amount']+"'></div>");
                $("#editContent").append( "<div class='form-group'><label for='Description'>Description:</label><input class='form-control' type='text' value='"+items['note']+"'></div>");
                $("#editContent").append( "<div class='form-group'><label for='Document'>Document:</label><div style='border:1px solid #c9cfdd;border-radius:3px;height:35px'><input type='file' name='document' value='"+items['document']+"'></div></div>");
                
                          //$(".modal-body").append("<tr><td align='left'><strong>"+key+"</strong></td><td align='left' ><input type='text' style='width:400px;margin-right:150px' value='"+val+"'></td></tr>");
            });

        };

    </script>
    <style>
        label {  display:flex  }
    </style>


@stop

