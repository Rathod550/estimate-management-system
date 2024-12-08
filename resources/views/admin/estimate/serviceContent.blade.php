<div class="service-{{$service->id}}">	
	<h3 style="margin-top:20px;">{{$service->name ?? ''}}</h3>
	@if(!empty($service->serviceSubMenus) && $service->serviceSubMenus->count() > 0)
		@foreach($service->serviceSubMenus as $key => $value)
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="service[{{ $service->id }}][{{ $key }}][name]" value="{{ $value->name }}" class="form-control" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="service[{{ $service->id }}][{{ $key }}][price]" class="form-control price price-service-{{ $service->id }}" data-id="{{ $service->id }}" placeholder="Price">
						<span class="text-danger error-text service_{{ $service->id }}_{{ $key }}_price_err"></span>
					</div>
				</div>
			</div>
			@if($loop->last)
				<div class="row mt-3">
					<div class="col-md-6">
						<div class="form-group">
							<h4 class="mt-1" style="float:right;">Total Price</h4>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="service[{{ $service->id }}][{{ $key }}][total_price]" class="form-control total-price-{{$service->id}}" placeholder="Total Price" readonly>
						</div>
					</div>
				</div>
			@endif
		@endforeach
	@else
		<div class="row">
			<div class="col-md-12">
				<center>No Service Found</center>
			</div>
		</div>
	@endif
	<hr>
</div>