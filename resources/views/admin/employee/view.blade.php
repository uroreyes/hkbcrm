

@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-sm-4 ">
         <div class="card" style="width: 18rem;">
            
            <div class="card-body">
               <h5 class="card-title">{{ $employee->first_name.' '.$employee->last_name }}</h5>
               <p class="card-text">
               <ul>
                <li>Email: {{ $employee->email }}</li>
                <li>Phone: {{ $employee->phone }}</li>
                <li>Company: {{ $employee->company->name }}</li>
               </ul>
               </p>
               

               <a href='{{  url("/admin/employees") }}' class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

