@props(['name'])

@error($name)
<p class="text-sm text-red-500 pt-2">{{$message}}</p>
@enderror
