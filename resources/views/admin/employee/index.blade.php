

@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row ">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">{{ __('admin.modules.employees') }}
               <a href='{{  url("/admin/employees/create") }}' class="btn btn-primary float-right">{{__('admin.actions.new')}} {{  Str::singular(__('admin.modules.employees'))}}</a>
            </div>
            <div id="companies" class="card-body">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($employees as $row)
                     <tr>
                        <td>{{ $row->first_name }}</td>
                        <td>{{ $row->last_name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->company->name }}</td>
                        <td>
                           <form action="{{ route('admin.employees.destroy', $row->id)}}" method="post" onsubmit="return confirm('Do you really want to delete this record?');">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger float-right" type="submit">{{ __('admin.actions.delete') }}</button>
                           </form>
                           <a href='{{  url("/admin/employees/$row->id/edit") }}'  class="btn btn-info float-right" style="margin-right:5px">{{ __('admin.actions.edit') }}</a>
                           <a href='{{  url("/admin/employees/$row->id/") }}'  class="btn btn-info float-right" style="margin-right:5px">{{ __('admin.actions.view') }}</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <div class="row justify-content-center">{{ $employees->links() }}</div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

