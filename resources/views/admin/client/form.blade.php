<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Name: <span class="text-danger">*</span></label><br>
            {{ Form::text('name',old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) }}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>GST Number: </label><br>
            {{ Form::text('gst_number',old('gst_number'), ['class' => 'form-control', 'placeholder' => 'GST Number']) }}
            @error('gst_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Address: <span class="text-danger">*</span></label><br>
            {{ Form::text('address',old('address'), ['class' => 'form-control', 'placeholder' => 'Address']) }}
            @error('address')
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