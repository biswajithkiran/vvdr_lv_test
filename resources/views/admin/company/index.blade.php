@extends('layouts.admin.main')
@section('content')
<!--<div class="content-wrapper">-->
            <div class="page-header">
              <h3 class="page-title">Company</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('companies.create') }}"><button type="button" class="btn btn-gradient-primary btn-fw">Add New</button></a>
                  </li>
                </ul>
              </nav>
            </div>
            @if ($message = Session::get('success'))
            <p class="text-success text-center"><strong>{{ $message }}</strong></p>
            @endif
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <td>#</td>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Created At</th>
                            <th>Actions</th>                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($arrCompany as $company)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->logo }}</td>
                        <td>{{ date('M d, Y', strtotime($company->created_at)); }} </td>
                        <td><a href="{{ route('companies.edit', $company->id) }}" title="Edit"><i class="mdi mdi-table-edit"></i></a>&nbsp;
                          <!--<a onclick="return delconfirm({{ $loop->iteration }});" ><i class="mdi mdi-delete"></i></a>-->
                          <form name="comp_{{ $loop->iteration }}" id="comp_{{ $loop->iteration }}" action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" name="submit" value="Delete">Delete</button>
                          </form><!--<input type="hidden" name="inc" value="{{ $loop->iteration }}">-->
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
          <!--</div>-->
@endsection
<script type="text/javascript" language="">
      function delconfirm(id)
      {
        var x=confirm("Do you want to delete this record?");        
        if(x)
        {
          e.preventDefault();
          var form='comp_'+id;
          document.form.submit()
          //form('comp_'+id).submit();
          //return true;
        }
        else
          return false;
      }
    </script>