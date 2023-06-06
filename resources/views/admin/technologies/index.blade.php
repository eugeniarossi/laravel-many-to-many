@extends('layouts.app')

@section('content')
<div class="container my-3">

    <div class="d-flex justify-content-between align-items-center my-4">
        <h2>Technologies list</h2>
        {{-- create technology --}}
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-md btn-info">Create new Technology</a>
    </div>

    {{-- message - technology created --}}
    @include('partials.message')
    {{-- /message - technology created --}}

    {{-- table --}}
    <table class="table">
        {{-- table head --}}
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        {{-- /table head --}}
        <tbody>
            {{-- element to repeat --}}
            @foreach ($technologies as $technology)
            <tr>
            <th scope="row">{{ $technology->id }}</th>
            <td>{{ $technology->name }}</td>
            <td>{{ $technology->slug }}</td>
            {{-- actions --}}
            <td>
                <ul class="list-unstyled d-flex">
                    {{-- show --}}
                    <li>
                        <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-sm btn-primary mx-1">Show</a>
                    </li>
                    {{-- edit --}}
                    <li>
                        <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-sm btn-warning mx-1">Edit</a>
                    </li>
                    {{-- delete --}}
                    <li>
                        {{-- button trigger delete modal --}}
                        <a href="#" class="btn btn-sm btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#type-{{ $technology->id }}">Delete</a>
                    </li>
                </ul>
            </td>
            {{-- /actions --}}
            </tr>

            {{-- modal --}}
            <div class="modal fade" id="type-{{ $technology->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete technology <strong>{{ $technology->name }}</strong>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger my-1">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            {{-- /modal --}}
            @endforeach
            {{-- element to repeat --}}
        </tbody>
    </table>  
    {{-- /table --}}
</div>
@endsection
