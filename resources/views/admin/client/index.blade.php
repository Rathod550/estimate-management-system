@extends($adminTheme)

@section('title', 'Client')

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
								<div class="col-md-12">
						  			<h5 class="card-title">Client Create</h5>
								</div>
							</div>
							{!! Form::open(['route' => 'admin.client.store', 'method' => 'post', 'files' => 'true']) !!}
								@include('admin.client.form')
							{!! Form::close() !!}
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
						  			<h5 class="card-title">Client List</h5>
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
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.client') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection