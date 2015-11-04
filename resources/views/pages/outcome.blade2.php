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
                        <th>id</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Document</th>
                        <th>Date</th>
                    </tr>
                    @foreach ($outcomes as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->amount }}</td>
                            <td>{{ $row->support_doc }}</td>
                            <td>{{ $row->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style=" width: 40%;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Outcome</h3>
                </div>
                {!! Form::open(['url' => 'outcome']) !!}
                <form action="/outcome" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-body" align="center">

                                <table border="0" valign="bottom">
                                    <tr>
                                        <td width="100">Type</td>
                                        <td>
                                                <select class="selectpicker" >
                                                    <option value="0">--Select type--</option>
                                                    <option value="1">Food</option>
                                                    <option value="2">Rent</option>
                                                    <option value="3">Gas</option>
                                                    <option value="4">Electricity</option>
                                                    <option value="4">Telephone</option>
                                                    <option value="4">Internet</option>
                                                    <option value="4">Council Tax</option>
                                                    <option value="4">Car</option>
                                                    <option value="4">Water</option>
                                                </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Month</td>
                                        <td>
                                                <select class="selectpicker">
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td> <input class="form-control" type="number" id="amount" ></td>
                                    </tr>
                                    <tr>
                                        <td>Note</td>
                                        <td><input class="form-control" type="text" id="description" ></td>
                                    </tr>
                                    <tr>
                                        <td>Document</td>
                                        <td>
                                            <span class="btn btn-file btn-default"><input type="file" /></span>
                                        </td>
                                    </tr>
                                </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

<style>
table td {  padding:10px;  }
.bootstrap-select > .dropdown-toggle {  width: 127%;  }
</style>
<script>

</script>
@stop

