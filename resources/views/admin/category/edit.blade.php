@extends($adminTheme)

@section('title', 'Category Edit')

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
						  			<h5 class="card-title">Category Edit</h5>
								</div>
								<div class="col-md-6">
									<a href="{{ route('admin.category') }}" type="button" class="btn btn-success btn-sm mt-3" style="float: right;"><i class="ri-arrow-left-fill"></i></a>
								</div>
							</div>

							{!! Form::model($category, ['method' => 'PUT','route' => ["admin.category.update", $category->id],'files'=>true]) !!}
			                    @include('admin.category.form')
			                {!! Form::close() !!}
						</div>
					</div>

				</div>
			</div>
	    </section>

  	</main>
@endsection

@section('script')

@endsection