@csrf
<div>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ $thread->title }}" />
    @error('title')
        <div class = "alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="body">Body</label>
    <input type="text" id="body" name="body" value="{{ $thread->body }}" />
    </textarea>
    @error('body')
        <div class = "alert alert-danger">{{ $message }}</div>
    @enderror

</div>

<div>
    <label for="category_id">Category ID</label>
    <input type="text" id="category_id" name="category_id" value="{{ $thread->category_id }}" />
</div>

<div>
    <label for="user_id">User ID</label>
    <input type="text" id="user_id" name="user_id" value="{{ $thread->user_id }}" />
</div>