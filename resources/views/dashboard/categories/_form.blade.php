
@if ($errors->any())
    <div class="alert alert-danger">
        <h3>Error Occured!</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <x-form.input label="Category Name" name="name" :value="$category->name" type="text" role="input"/>
</div>


<div class="form-group">
    <label for="">Category Parent</label>
    <select name="parent_id" class="form-control form-select" style="width: 450px">
        <option value="">Primary Category</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" 
                @if( old('parent_id', $category->parent_id) == $parent->id) selected @endif>{{ $parent->name }}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <x-form.textarea label="Description" name="description" :value="$category->description"/>
</div>


<div class="form-group">
    <x-form.label id="image">Select image</x-form.label>
    <x-form.input :value="$category->category_image" type="file" name="category_image" accept="image/*" />
    @if ($category->category_image)
        <img src="{{ asset('storage/'.$category->category_image) }}" alt="" height="80">
    @endif
</div>


<div class="form-group">
    <label for="">Status</label>
    <div>
        <div class="form-check">
             <input class="form-check-input  @error('status') is-invalid @enderror" type="radio" name="status" value="Active" @if( old('status', $category->status)  == "Active") checked @endif>
            <label class="form-check-label">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" value="Archived" @if( old('status', $category->status)  == "Archived") checked @endif>
            <label class="form-check-label">
              Archived
            </label>
          </div>
    </div>
</div>



<div class="form-group">
    <button type="submit" class="btn btn-sm btn-outline-success">{{ $button_label ?? "Save" }}</button>
</div>