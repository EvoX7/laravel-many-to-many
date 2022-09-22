{{-- Title --}}
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}"
        required>
    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
{{-- Author --}}
<div class="mb-3">
    <label for="title" class="form-label">Author</label>
    <input type="text" class="form-control" name="user_id" id="user_id" value="{{ old('user->name', $post->user_id) }}"
        required>
    @error('user_id')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
{{-- Image URL --}}
<div class="mb-3">
    <label for="post_url" class="form-label">Image URL</label>
    <input type="text" class="form-control" name="post_url" id="post_url"
        value="{{ old('post_url', $post->post_url) }}">
    @error('postURL')
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
{{-- Post content --}}
<div class="mb-3">
    <label for="post_content" class="form-label">Post Content</label>
    <textarea class="form-control" name="post_content"id="post_content" rows="6" aria-describedby="Post_contentHelp"
        required>{{ old('post_content', $post->post_content) }}</textarea>
    <div id="Post_contentHelp" class="form-text">Please insert your post.</div>
    @error('post_content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
