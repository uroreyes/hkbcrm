

@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row ">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">{{ __('admin.modules.companies') }}
               <a href='{{  url("/admin/companies/create") }}' class="btn btn-primary float-right">New Company</a>
            </div>
            <div id="companies" class="card-body">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($companies as $row)
                     <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                           <form action="{{ route('admin.companies.destroy', $row->id)}}" method="post" onsubmit="return confirm('Do you really want to delete this record?');">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger float-right" type="submit">{{ __('admin.actions.delete') }}</button>
                           </form>
                           <a href='{{  url("/admin/companies/$row->id/edit") }}'  class="btn btn-info float-right" style="margin-right:5px">{{ __('admin.actions.edit') }}</a>
                           <a href='{{  url("/admin/companies/$row->id/") }}'  class="btn btn-info float-right" style="margin-right:5px">{{ __('admin.actions.view') }}</a>
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
@endsection

