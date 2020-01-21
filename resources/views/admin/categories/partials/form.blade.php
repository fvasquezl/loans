<div class="modal-body">
    <div class="form-group">
        <input name="name" value="{{ old('name', $category->name) }}"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Inresa aqu&iacute; el nombre de la categoria">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>