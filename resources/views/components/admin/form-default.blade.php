<form 
    id="{{ $id }}"
    action="{{ $action }}" 
    method="post" 
    @if ($isMultipart) enctype="multipart/form-data" @endif
    class="flex flex-col gap-6"> 
    @csrf 
    {{ $slot }}
</form>
