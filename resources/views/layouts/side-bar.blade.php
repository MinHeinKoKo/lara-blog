<div class="list-group mb-2">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="{{ route('test') }}" class="list-group-item list-group-item-action">test</a>
    <a href="{{ route('photo.index') }}" class="list-group-item list-group-item-action">Gallary</a>
</div>

<p class="small text-black-50">Manage Posts</p>
<div class="list-group mb-3">
    <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action">Post Lists</a>
    <a href="{{ route('post.create') }}" class="list-group-item list-group-item-action">Create Post</a>
</div>

<p class="small text-black-50">Manage Category</p>
<div class="list-group mb-3">
    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">Category Lists</a>
    <a href="{{ route('category.create') }}" class="list-group-item list-group-item-action">Create Category</a>
</div>

@admin
<p class="small text-black-50">Manage User</p>
<div class="list-group mb-3">
    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">User Lists</a>
</div>
    @endadmin



