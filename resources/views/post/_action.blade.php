<button id="btnGroupDrop{{ $post->id }}" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('Action')</button>
<div class="dropdown-menu" aria-labelledby="btnGroupDrop{{ $post->id }}">
    <a href="{{ route('post.edit', $post) }}" class="dropdown-item">@lang('Edit')</a>
    <a href="{{ route('post.show', $post) }}" class="dropdown-item"
        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();">@lang('Delete')</a>
    <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>