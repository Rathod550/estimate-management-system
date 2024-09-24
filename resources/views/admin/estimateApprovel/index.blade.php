@extends($adminTheme)

@section('title', 'Estimate Approval')

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
						  			<h5 class="card-title">Estimate Approval List</h5>
								</div>
							</div>

							<!-- Table with stripped rows -->
							<div class="table-responsive">
								<table class="table table-bordered data-table">
						        <thead>
						            <tr>
						                <th width="5%">Id</th>
						                <th width="25%">Client Name</th>
						                <th width="25%">Category Name</th>
						                <th width="25%">Service Name</th>
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
        ajax: "{{ route('admin.estimate.approval') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            {data: 'client', name: 'client'},
            {data: 'category', name: 'category'},
            {data: 'service', name: 'service'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection