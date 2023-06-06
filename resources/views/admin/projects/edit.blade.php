@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h3 class="my-3">{{ $project->title }}</h3>

    {{-- validation errors --}}
    @include('partials.errors')
    {{-- /validation errors --}}

    {{-- form --}}
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- title input --}}
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
        </div>
        {{-- /title input --}}
        {{-- image input --}}
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $project->image) }}">
        </div>
        {{-- /image input --}}
        {{-- content input --}}
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea type="form-control" class="form-control" id="content" name="content">{{ old('content', $project->content) }}</textarea>
        </div>
        {{-- /content input --}}
        {{-- type input --}}
        <div class="mb-3">
          <select class="form-select" name="type_id" id="type_id">
            <option value="">Select type</option>
            @foreach ($types as $type)
              <option value="{{ $type->id}}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
          </select>
        </div>
        {{-- /type input --}}
        {{-- technologies input --}}
        <div class="mb-3">
          <div>Technologies</div>
          @if ($errors->any())  {{-- se ci sono errori mostra condizione con array --}}
              @foreach ($technologies as $technology)
                <div class="form-check form-check-inline my-2">
                  <input class="form-check-input" type="checkbox" id="technologies" value="{{ $technology->id }}" name="technologies[]" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                  <label class="form-check-label" for="technologies">{{ $technology->name }}</label>
                </div>
              @endforeach
          @else {{-- altrimenti mostra condizione con array --}}
            @foreach ($technologies as $technology)
              <div class="form-check form-check-inline my-2">
                <input class="form-check-input" type="checkbox" id="technologies" value="{{ $technology->id }}" name="technologies[]" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="technologies">{{ $technology->name }}</label>
              </div>
            @endforeach
          @endif
        </div>
        {{-- /technologies input --}}
        {{-- edit button --}}
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
      {{-- /form --}}
</div>
@endsection
