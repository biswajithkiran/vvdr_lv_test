@extends('layouts.admin.main')
@section('content')
<style type="text/css">
  .error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    font-size: 14px;
}

.form-control.error {
    border-color: red;
    padding: .375rem .75rem;
}
</style>
<!--<div class="content-wrapper">-->
            <div class="page-header">
              <h3 class="page-title">Employees</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('employees.index') }}"><button type="button" class="btn btn-gradient-primary btn-fw">Back</button></a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Employee Details</h4>
                    <form class="form-sample" id="form1" name="form1" action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @method('PUT')        
                    @csrf
                    <input type="hidden" name="id" value="{{ $employee->id }}">
                      <!--<p class="text-danger text-center"> Error message here.. </p>-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name*</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name', $employee->first_name)}}">
                              @if ($errors->has('first_name'))
                              <span class="text-danger error">{{ $errors->first('first_name') }}</span>
                              @endif                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name*</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name', $employee->last_name)}}">
                              @if ($errors->has('last_name'))
                              <span class="text-danger error">{{ $errors->first('last_name') }}</span>
                              @endif                              
                            </div>
                          </div>
                        </div>                        
                      </div>                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email Address*</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="email" id="email" value="{{$employee->email}}" readonly>                                                           
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company</label>
                            <div class="col-sm-9">
                              <select class="form-control form-control-sm" name="company" id="company">
                                
                                 @foreach ($arrCompany as $key=>$value)
                                <option value="{{ $value['id'] }}" <?php if($employee->cid == $value['id']) { ?>selected= "selected"<?php } ?>>{{ $value['name'] }}</option>
                                @endforeach                      
                              </select>                              
                              @if ($errors->has('company'))
                              <span class="text-danger error">{{ $errors->first('company') }}</span>
                              @endif                             
                            </div>
                          </div>
                        </div>
                                              
                      </div>   
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone&nbsp;Number*</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone', $employee->phone)}}">
                              @if ($errors->has('phone'))
                              <span class="text-danger error">{{ $errors->first('phone') }}</span>
                              @endif                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">&nbsp;</div>
                                              
                      </div>

                      <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2"><button type="submit" class="btn btn-gradient-success btn-fw">Save</button></div>
                      </div>                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <!--</div>-->
@endsection