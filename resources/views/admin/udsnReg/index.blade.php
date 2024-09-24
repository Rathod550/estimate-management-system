@extends($adminTheme)

@section('title', 'Udsn Regs')

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
						  			<h5 class="card-title">Udsn Regs Create</h5>
								</div>
							</div>
							{!! Form::open(['route' => 'admin.udsn.store', 'method' => 'post', 'files' => 'true']) !!}
								@include('admin.udsnReg.form')
							{!! Form::close() !!}
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
						  			<h5 class="card-title">Service List</h5>
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
						                <th>Client</th>
						                <th>Udsn Number</th>
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
        ajax: "{{ route('admin.udsn.reg') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            {data: 'client', name: 'client'},
            {data: 'udsn_number', name: 'udsn_number'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection