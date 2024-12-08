@extends($adminTheme)

@section('title', 'Estimate Approlal')

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
						  			<h5 class="card-title">Estimate Approlal</h5>
								</div>
								<div class="col-md-6">
									<a href="{{ route('admin.estimate.approval') }}" type="button" class="btn btn-success btn-sm mt-3" style="float: right;"><i class="ri-arrow-left-fill"></i></a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
							        <div class="form-group">
							            <label>Client Name: </label><br>
							            <input type="text" value="{{ $estimate->client->name ?? '' }}" class="form-control" readonly>
							        </div>
							    </div>
							    <div class="col-md-6">
							        <div class="form-group">
							            <label>Estimate Category: </label><br>
							            <input type="text" value="{{ $estimate->category->name ?? '' }}" class="form-control" readonly>
							        </div>
							    </div>
							</div>
							<div class="row mt-2">
								<div class="col-md-12">
							        <div class="form-group">
							            <label>Service Name: </label><br>
							            <input type="text" value="{{ $serviceName ?? '' }}" class="form-control" readonly>
							        </div>
							    </div>
							</div>
							@if(!empty($estimate))
						        @php
						            $serviceContent = json_decode($estimate->service_content);
						        @endphp

						        @if(!empty($serviceContent))
						            @foreach($serviceContent as $key => $value)
						            	<h3 style="margin-top:20px;">{{ $service[$key] ?? '' }}</h3>
							                @foreach($value as $kkey => $vvalue)
								                <div class="row mt-3">
								                    <div class="col-md-6">
								                        <div class="form-group">
								                            <input type="text" name="service[{{$key}}][{{ $kkey }}][name]" value="{{ $vvalue->name ?? '' }}" class="form-control" readonly>
								                        </div>
								                    </div>
								                    <div class="col-md-6">
								                        <div class="form-group">
								                            <input type="text" name="service[{{$key}}][{{ $kkey }}][price]" class="form-control price price-service-{{ $key }}" value="{{ $vvalue->price ?? '' }}" data-id="{{ $key }}" placeholder="Price" readonly>
								                            <span class="text-danger error-text service_{{ $key }}_price_err"></span>
								                        </div>
								                    </div>
								                </div>
								                @if($loop->last && isset($vvalue->total_price))
						                            <div class="row mt-3">
						                                <div class="col-md-6">
						                                    <div class="form-group">
						                                        <h4 class="mt-1" style="float:right;">Total Price</h4>
						                                    </div>
						                                </div>
						                                <div class="col-md-6">
						                                    <div class="form-group">
						                                        <input type="text" name="service[{{$key}}][{{ $kkey }}][total_price]" class="form-control total-price-{{$key}}" placeholder="Total Price" value="{{ $vvalue->total_price ?? '' }}" readonly>
						                                    </div>
						                                </div>
						                            </div>                
						                        @endif
								            @endforeach
						            @endforeach
						            @if(!empty($estimate->gst) && !empty($estimate->sgst))
							            <div class="row mt-3">
							                <div class="col-md-6">
							                    <div class="form-group">
							                        <h4 class="mt-1" style="float:right;">CGST  @ 9% Amount</h4>
							                    </div>
							                </div>
							                <div class="col-md-6">
							                    <div class="form-group">
							                        <input type="text" name="price" class="form-control" placeholder="Total Price" value="{{ $estimate->gst ?? '' }}" readonly>
							                    </div>
							                </div>
							            </div>
							            <div class="row mt-3">
							                <div class="col-md-6">
							                    <div class="form-group">
							                        <h4 class="mt-1" style="float:right;">SGST @ 9% Amount</h4>
							                    </div>
							                </div>
							                <div class="col-md-6">
							                    <div class="form-group">
							                        <input type="text" name="price" class="form-control" placeholder="Total Price" value="{{ $estimate->sgst ?? '' }}" readonly>
							                    </div>
							                </div>
							            </div>
						            @endif
						            <div class="row mt-3">
						                <div class="col-md-6">
						                    <div class="form-group">
						                        <h4 class="mt-1" style="float:right;">Total Amount</h4>
						                    </div>
						                </div>
						                <div class="col-md-6">
						                    <div class="form-group">
						                        <input type="text" name="price" class="form-control total-price" placeholder="Total Price" value="{{ $estimate->total_price ?? '' }}" readonly>
						                    </div>
						                </div>
						            </div>
						        @endif
						    @endif
						    <div class="row mt-5">
						    	<div class="col-md-12">
						    		<center><a href="{{ route('admin.approval.estimate.approve',[$estimate->id]) }}" type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Approve</a></center>
						    	</div>
						    </div>
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