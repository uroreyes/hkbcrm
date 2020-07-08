

@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-8 offset-sm-2">
         <h3 class="display-3">{{__('admin.actions.add')}} {{  Str::singular(__('admin.modules.employees'))}}</h3>
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
            <form method="post" action="{{ route('admin.employees.store') }}" />
               
               @csrf
               <div class="form-group">    
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"/>
               </div>
               <div class="form-group">    
                  <label for="first_name">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"/>
               </div>
               
               <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
               </div>
               <div class="form-group">
                  <label for="email">Phone:</label>
                  <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"/>
               </div>
               <div class="form-group">
                  <label for="email">Company:</label>
                  <select class="form-control" name="company_id">
                  <option value="">Select Company</option>      
                    @foreach($companies as $row)
                        <option value="{{ $row->id }}"  {{ ( $row->id == old('company_id')) ? 'selected' : '' }}>{{ $row->name }}</option>      
                    @endforeach
                  </select>
               </div>
               
               <a href='{{  url("/admin/employees/") }}'  class="btn btn-info " style="margin-right:5px">{{ __('admin.actions.cancel') }}</a>
               <button type="submit" class="btn btn-primary">{{ __('admin.actions.save') }}</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

