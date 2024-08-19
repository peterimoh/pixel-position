@props(['width' => 90, 'employer'])
<img class="rounded-xl" src="{{asset($employer->logo)}}" alt="{{$employer->name}}" width="{{$width}}" height="{{$width}}">
