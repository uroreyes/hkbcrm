

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

