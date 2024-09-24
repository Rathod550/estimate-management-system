@extends($adminTheme)

@section('title', 'Estimate Create')

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
						  			<h5 class="card-title">Estimate Create</h5>
								</div>
								<div class="col-md-6">
									<a href="{{ route('admin.estimate') }}" type="button" class="btn btn-success btn-sm mt-3" style="float: right;"><i class="ri-arrow-left-fill"></i></a>
								</div>
							</div>

							{!! Form::open(['route' => 'admin.estimate.store', 'method' => 'post', 'files' => 'true']) !!}
			                    @include('admin.estimate.form')
			                {!! Form::close() !!}
						</div>
					</div>

				</div>
			</div>
	    </section>

  	</main>
@endsection

@section('script')
<script type="text/javascript">
	var token = '{{ csrf_token() }}';
</script>
<script src="{{ asset('adminTheme/admin/estimate.js') }}"></script>
@endsection