@extends($adminTheme)

@section('title', 'Service Sub Menus')

@section('style')

@endsection

@section('content')
	<main id="main" class="main">
	    <section class="section">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
						  			<h5 class="card-title">{{ $service->name }} || Service Sub Menus Create</h5>
								</div>
								<div class="col-md-6">
									<a href="{{ route('admin.service') }}" type="button" class="btn btn-success btn-sm mt-3" style="float: right;"><i class="ri-arrow-left-fill"></i></a>
								</div>
							</div>
							{!! Form::open(['route' => 'admin.service.sub.menu.store', 'method' => 'post', 'files' => 'true']) !!}
								<input type="hidden" name="service_id" value="{{ $id }}">
								@include('admin.serviceSubMenus.form')
							{!! Form::close() !!}
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
						  			<h5 class="card-title"> {{ $service->name }} || Service Sub Menus List</h5>
								</div>
								<div class="col-md-6">
									
								</div>
							</div>

							<!-- Table with stripped rows -->
							<div class="table-responsive">
								<table class="table table-bordered data-table">
							        <thead>
							            <tr>
							                <th>Id</th>
							                <th>Name</th>
							                <th width="100px">Action</th>
							            </tr>
							        </thead>
							        <tbody>
							        	@if(!empty($serviceSubMenu) && $serviceSubMenu->count() > 0)
							        		@foreach($serviceSubMenu as $key => $value)
									        	<tr>
									        		<td>{{ ++$key }}</td>
									        		<td>{{ $value->name ?? '' }}</td>
									        		<td>
									        			<a href="{{ route('admin.service.sub.menu.edit',[$value->id]) }}" class="edit btn btn-primary btn-sm" style="margin-right:5px;"><i class="fa fa-edit"></i></a>
									        			<a href="{{ route('admin.service.sub.menu.delete', [$value->id]) }}" class="text-white btn btn-danger btn-sm remove-crud" data-id="{{ $value->id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
									        		</td>
									        	</tr>
							        		@endforeach
							        	@else
							        		<tr>
								        		<td colspan="3"><center>No Data Found</center></td>
								        	</tr>
							        	@endif
							        </tbody>
							    </table>
							</div>
							<!-- End Table with stripped rows -->
						</div>
					</div>

				</div>
			</div>
	    </section>

  	</main>
@endsection

@section('script')

@endsection