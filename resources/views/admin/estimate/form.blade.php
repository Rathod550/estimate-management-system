<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Client: <span class="text-danger">*</span></label><br>
            {!! Form::select('client_id',['' => 'Select Client']+$client, null, ['class' => 'form-select']) !!}
            <span class="text-danger error-text client_id_err"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Category: <span class="text-danger">*</span></label><br>
            {!! Form::select('category_id',['' => 'Select Category']+$category, null, ['class' => 'form-select']) !!}
            <span class="text-danger error-text category_id_err"></span>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label>Service: <span class="text-danger">*</span></label><br>
            {!! Form::select('service_id',['' => 'Select Service']+$service, null, ['class' => 'form-select service-id']) !!}
            <span class="text-danger error-text service_id_err"></span>
        </div>
    </div>
</div>
<div class="service-content mt-2">
    @if(!empty($estimate))
        @php
            $serviceContent = json_decode($estimate->service_content);
        @endphp

        @if(!empty($serviceContent))
            @foreach($serviceContent as $key => $value)
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="service[{{ $key }}][name]" value="{{ $value->name ?? '' }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" name="service[{{ $key }}][price]" class="form-control price" value="{{ $value->price ?? '' }}" placeholder="Price">
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
                        <input type="text" name="price" class="form-control total-price" placeholder="Total Price" value="{{ $estimate->total_price ?? '' }}" readonly>
                    </div>
                </div>
            </div>
        @endif
    @endif

</div>
<div class="row">
    <div class="col-md-12">
        <center><button type="button" class="btn btn-success btn-sm mt-3 estimate-save-btn">Save</button></center>
    </div>
</div>