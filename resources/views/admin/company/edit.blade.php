

@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-8 offset-sm-2">
         <h3 class="display-3">Edit Company</h3>
         <div>
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            <br />
            @endif
            <form method="post" action="{{ route('admin.companies.update', $company->id) }}" enctype="multipart/form-data">
               @method('PATCH') 
               @csrf
               <div class="form-group">    
                  <label for="first_name">Name:</label>
                  <input type="text" class="form-control" name="name" value="{{ $company->name }}"/>
               </div>
               
               <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email" value="{{ $company->email }}"/>
               </div>
               <div class="form-group">
                  <label for="photo">Attach a Logo</label>
                  <input type="file" name="logo" id="logo" class="form-control-file">
               </div>
               <a href='{{  url("/admin/companies/") }}'  class="btn btn-info " style="margin-right:5px">{{ __('admin.actions.cancel') }}</a>
               <button type="submit" class="btn btn-primary">{{ __('admin.actions.save') }}</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

