<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Name: <span class="text-danger">*</span></label><br>
            {{ Form::text('name',old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) }}
            @error('name')
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