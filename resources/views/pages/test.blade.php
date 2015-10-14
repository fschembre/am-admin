@extends('layouts.default')

@section('content')

        <!-- Button trigger modal -->

<a href="#" onclick="ClickIt(4)">ssss</a>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
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

    function ClickIt(id) {
        $('#myModal').modal('toggle')
        $.getJSON( "/employees/get/"+id, function( data ) {
            var items = [];
            $.each( data, function( key, val ) {
              $(".modal-body").append("<tr><td align='left' width='150'><strong>"+key+"</strong></td><td>"+val+"</td></tr>");
            });
        });
    };

</script>
@stop