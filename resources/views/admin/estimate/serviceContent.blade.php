@if(!empty($service->serviceSubMenus) && $service->serviceSubMenus->count() > 0)
	@foreach($service->serviceSubMenus as $key => $value)
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="service[{{ $key }}][name]" value="{{ $value->name }}" class="form-control" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="number" name="service[{{ $key }}][price]" class="form-control price" placeholder="Price">
					<span class="text-danger error-text service_{{ $key }}_price_err"></span>
				</div>
			</div>
		</div>
	@endforeach
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="form-group">
				<h4 class="mt-1" style="float:right;">Total Price</h4>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" name="price" class="form-control total-price" placeholder="Total Price" readonly>
			</div>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-md-12">
			<center>No Service Found</center>
		</div>
	</div>
@endif