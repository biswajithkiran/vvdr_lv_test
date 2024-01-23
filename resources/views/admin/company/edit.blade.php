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
              <h3 class="page-title">Company</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('companies.index') }}"><button type="button" class="btn btn-gradient-primary btn-fw">Back</button></a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Company</h4>
                    <form class="form-sample" id="form1" name="form1" action="{{ route('companies.update',$company->id) }}" method="POST" 
                    enctype="multipart/form-data" >
                    @method('PUT')        
                    @csrf
                      <!--<p class="text-danger text-center"> Error message here.. </p>-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Title/Name*</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" id="name" value="{{old('name', $company->name)}}">
                              @if ($errors->has('name'))
                              <span class="text-danger error">{{ $errors->first('name') }}</span>
                              @endif                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email Address*</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" readonly name="email" id="email" value="{{$company->email}}">
                              @if ($errors->has('email'))
                              <span class="text-danger error">{{ $errors->first('email') }}</span>
                              @endif                              
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Website</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="website" id="website" value="{{old('website', $company->website)}}">
                              <!--@if ($errors->has('website'))
                              <span class="text-danger error">{{ $errors->first('website') }}</span>
                              @endif -->                             
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Upload Logo</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control file-upload-info" name="logo" placeholder="Upload Logo" id="logo"> 
                              @if ($errors->has('logo'))
                              <span class="text-danger error">{{ $errors->first('logo') }}</span>
                              @endif                         
                            </div>
                          </div>
                        </div>                      
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