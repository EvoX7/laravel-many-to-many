{{-- Title --}}
<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ old('name', $category->name) }}"
        required>
    @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>



{{-- Post date --}}
<div class="mb-3">
    <label for="post_date" class="form-label">Post date</label>
    <input type="date" class="form-control" name="post_date" id="post_date"
        value="{{ old('post_date', $post->post_date) }}" required>
    @error('post_date')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

</div>
