@extends('layouts.app')

@section('content')
<div class="container my-3">
    {{-- title --}}
    <h3 class="my-3">{{ $project->title }}</h3>

    {{-- type --}}
    <h5>Type: {{ $project->type?->name ?: 'None' }}</h5>

    {{-- technologies --}}
    <h6>Technologies: {{ $project->technologies->implode('name', ', ') ?: 'None'}}</h6>
    
    {{-- image --}}
    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="my-3">
    @endif
        
    {{-- content --}}
    <p>{{ $project->content }}</p>

    {{-- edit button --}}
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning my-3">Edit</a>
</div>
@endsection
