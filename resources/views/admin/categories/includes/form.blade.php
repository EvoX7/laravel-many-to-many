{{-- Name --}}
<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name) }}" required>
    @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Category --}}
<div class="mb-3">
    <label for="category" class="form-label">Choose category</label>
    <select type="text" class="form-control" name="category" id="category">
        <option value="">Unlisted</option>
        @foreach ($categories as $category)
            <option value="{{ old('category', $category->id) }}"
                @isset($post->category)
                {{ $category->id === $post->category->id ? 'selected' : '' }}
                @endisset>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>