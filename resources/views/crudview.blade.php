@extends('layouts.master')

@section('title')

View-Data 

@endsection



@section('content')

<!-- Session::flash($message);  -->


@if ($message = Session::get('sucessfully'))
        <div class="alert alert-success ">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('successed'))
        <div class="alert alert-success ">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('delete'))
        <div class="alert alert-success ">
            <p id="p">{{ $message }}</p>
        </div>
    @endif

 
<!-- Users Tables--> 
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col-auto float-right ml-auto">
								<a href="{{url('/')}}/crudindexpage" class="btn add-btn"><i class="fa fa-plus"></i> Add User</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Name</label>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-3">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
                    <br><br>
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
									
                    <th scope="col">SI.No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Date Of Birth</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Salary</th>
                      <th scope="col">Address</th>
                      
											<th class="text-right">Action</th>
										
										</tr>
									</thead>
									<tbody>

                  

                  @foreach($staff as $key=> $value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->phone_number}}</td>
                          <td>{{$value->date_of_birth}}</td>
                          <td>{{$value->designation}}</td>
                          <td>{{$value->salary}}</td>
                          <td>{{$value->address}}</td>
                          <td class="text-right">
                          <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{url('/')}}/edit-staff/{{$value->id}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" id="delete" onclick="dlt({{$value->id}})" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                        </tr>
                        @endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
        <script>

          function dlt(id)
        {
            $.ajax({
                type:'GET',
                url:"{{url('/')}}/delete-staff/"+id,
                success:function(response)
                {
                    $("#p").html(response);
                },
                error:function(err) {
                    alert('Something went wrong. Please check.')
                }
            });
        } 
                setTimeout(function(){ $('.alert').hide() },3000);
        
      </script>
<!--end table-->
@endsection

