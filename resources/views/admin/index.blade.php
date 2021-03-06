@extends('layouts.sidebar')
@section('mainContent')
        
<div class="normalheader transition animated fadeIn">
     <div class="hpanel">
          <div class="panel-body">
              <a class="small-header-action" href="">
                 <div class="clip-header"><i class="fa fa-arrow-up"></i></div>
              </a>
              <div id="hbreadcrumb" class="pull-right m-t-lg"></div>
              <h2 class="font-light m-b-xs">Admin List</h2>
              <small>You can delete Admin from the list. Once this operation is done, it can not be undone.</small>
              <br>
              <br>
              <a href="{{ route('admin.new') }}" class="btn btn-info btn-lg">New Admin</a>
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
                        Admin List
                  </div>
                  <div class="panel-body">
                      <table id="example2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Created At</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->title}} 
                                        {{$admin->name}} 
                                        {{$admin->last_name}}
                                    </td>
                                    <td>{{$admin->address_line1}}, 
                                        {{$admin->address_line2}}, 
                                        <br>{{$admin->city}},
                                        <br>{{$admin->country}}, 
                                        <br>{{$admin->postcode}}
                                    </td>
                                    <td>{{$admin->phone}}</td>
                                    <td>{{$admin->created_at}}</td>
                                    <td>
                                        <a href="{{ route('admin.single', ['admin' => $admin->id]) }}">
                                        <button type="button" class="btn btn-default btn-block">
                                                Details
                                        </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit', ['admin' => $admin->id]) }}">
                                           <button type="button" class="btn btn-default btn-block">
                                                Edit
                                           </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.delete', ['admin' => $admin->id])}}">
                                        <button type="button" class="btn btn-default btn-block">
                                                Delete
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $admins->links() }}
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
