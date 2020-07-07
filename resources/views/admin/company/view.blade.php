

@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-sm-4 ">
         <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/'.$company->logo)}}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">{{ $company->name }}</h5>
               <p class="card-text">{{ $company->email }}</p>
               <a href='{{  url("/admin/companies") }}' class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

