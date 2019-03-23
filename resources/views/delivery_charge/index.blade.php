@extends('layouts.sidebar')
@section('mainContent')
        
<div class="normalheader transition animated fadeIn">
     <div class="hpanel">
          <div class="panel-body">
              <a class="small-header-action" href="">
                 <div class="clip-header"><i class="fa fa-arrow-up"></i></div>
              </a>
              <div id="hbreadcrumb" class="pull-right m-t-lg"></div>
              <h2 class="font-light m-b-xs">Delivery Charge</h2>
              <small>You can not delete delivery charge from the list. You can only edit this section. If you decide to not to charge for delivery, please simply put the charge 0.00 and it will be fine.</small>
              <br>
              <br>
         </div>
     </div>
</div>
<div class="content animate-panel">
     <div class="row">
         <div class="col-lg-12">
             <div class="hpanel">
                  <div class="panel-heading">
                       <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
                        Delivery Charge List
                  </div>
                  <div class="panel-body">
                      <table id="example2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Charge ID</th>
                                <th>Charge Name</th>
                                <th>Minimum Amount</th>
                                <th>Maximum Amount</th>
                                <th>Delivery Charge</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($delivery_charges as $delivery_charge)
                                <tr>
                                    <td>{{$delivery_charge->id}}</td>
                                    <td>{{$delivery_charge->title}}</td>
                                    <td>{{$delivery_charge->min_amount}}</td>
                                    <td>
                                        {{$delivery_charge->max_amount}}
                                    </td>
                                    <td>
                                        {{$delivery_charge->charge}}
                                    </td>
                                    <td>
                                        <a href="{{ route('delivery_charge.edit', ['delivery_charge' => $delivery_charge->id]) }}">
                                           <button type="button" class="btn btn-default btn-block">
                                                Edit
                                           </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>   
<script>
        $(function () {
            // Initialize Example 1
            $('#example1').dataTable( {
                "ajax": 'api/datatables.json',
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                buttons: [
                    {extend: 'copy',className: 'btn-sm'},
                    {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                    {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                    {extend: 'print',className: 'btn-sm'}
                ]
            });

            // Initialize Example 2
            $('#example2').dataTable();

        });
</script>
@endsection
