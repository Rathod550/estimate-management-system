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
            <label>Email: <span class="text-danger">*</span></label><br>
            {{ Form::email('email',old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>password: @if(empty($user))<span class="text-danger">*</span> @endif</label><br>
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
            @error('password')
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