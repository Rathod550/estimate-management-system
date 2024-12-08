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
<br>
@if(!empty($service))
    <label>Service: <span class="text-danger">*</span></label><br>
    <div class="row">
        @foreach($service as $key => $value)
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" name="services[]" type="checkbox" value="{{ $key }}" id="service-{{$key}}" data-service-id="{{ $key }}" @if(!empty($services) && in_array($key,$services)) checked @endif>
                    <label class="form-check-label" for="service-{{$key}}">
                        {{$value}}
                    </label>
                </div>
            </div>
        @endforeach
        <span class="text-danger error-text services_err"></span>
    </div>
@endif
<div class="service-content mt-2">
    @if(!empty($estimate))
        @php
            $serviceContent = json_decode($estimate->service_content);
        @endphp

        @if(!empty($serviceContent))
            @foreach($serviceContent as $key => $value)
                <div class="service-{{$key}}">
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
                                    <input type="text" name="service[{{$key}}][{{ $kkey }}][price]" class="form-control price price-service-{{ $key }}" value="{{ $vvalue->price ?? '' }}" data-id="{{ $key }}" placeholder="Price">
                                    <span class="text-danger error-text service_{{$key}}_{{ $kkey }}_price_err"></span>
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
                </div>
            @endforeach
        @endif
    @endif
    

</div>
<div class="row">
    <div class="col-md-12">
        <center>
            <button type="button" class="btn btn-danger btn-sm mt-3 reset-btn">Reset</button>
            <button type="button" class="btn btn-success btn-sm mt-3 estimate-save-btn">Save</button>
        </center>
    </div>
</div>