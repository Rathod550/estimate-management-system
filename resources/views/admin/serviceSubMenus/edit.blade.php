@extends($adminTheme)

@section('title', 'Service Create Sub Menus')

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
						  			<h5 class="card-title">Service Sub Menus Edit</h5>
								</div>
								<div class="col-md-6">
									<a href="{{ route('admin.service.sub.menu',[$serviceSubMenu->service_id]) }}" type="button" class="btn btn-success btn-sm mt-3" style="float: right;"><i class="ri-arrow-left-fill"></i></a>
								</div>
							</div>

							{!! Form::model($serviceSubMenu, ['method' => 'PUT','route' => ["admin.service.sub.menu.update", $serviceSubMenu->id],'files'=>true]) !!}
			                    @include('admin.serviceSubMenus.form')
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