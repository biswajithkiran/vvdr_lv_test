@extends('layouts.admin.main')
@section('content')
<!--<div class="content-wrapper">-->
            <div class="page-header">
              <h3 class="page-title">Employees</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('employees.create') }}"><button type="button" class="btn btn-gradient-primary btn-fw">Add New</button></a>
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
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Created At</th>  
                            <th>Actions</th>                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($arrEmployee as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{$employee->company->name}}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ date('M d, Y', strtotime($employee->created_at)); }} </td>
                        <td><a href="{{ route('employees.edit', $employee->id) }}" title="Edit"><i class="mdi mdi-table-edit"></i></a>&nbsp;
                          <!--<a onclick="return delconfirm();" href="{{ route('employees.destroy', $employee->id) }}"><i class="mdi mdi-delete"></i></a>-->
                          <form name="emp_{{ $loop->iteration }}" id="emp_{{ $loop->iteration }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" name="submit" value="Delete">Delete</button>
                          </form>
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