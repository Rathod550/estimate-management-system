<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Client: <span class="text-danger">*</span></label><br>
            {!! Form::select('client_id',['' => 'Select Client']+$client, null, ['class' => 'form-select']) !!}
            @error('client_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Udsn Number: <span class="text-danger">*</span></label><br>
            {{ Form::text('udsn_number',old('udsn_number'), ['class' => 'form-control', 'placeholder' => 'Udsn Number']) }}
            @error('udsn_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <center><button type="submit" class="btn btn-success btn-sm mt-3">Save</button></center>
    </div>
</div>