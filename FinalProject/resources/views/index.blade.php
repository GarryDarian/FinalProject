@extends('layouts.app')

@section('title', 'Home | FinalProject')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-3">
                    <div class="col-md-12 bg-light rounded p-3 shadow-sm">
                        <img src="{{ asset('storage/blogs/' . $blog->thumbnail) }}" class="w-100">
                        <h4>{{ $blog->title }}</h4>
                        <span class="text-muted">{{ $blog->user->username }}</span>
                        <span class="badge bg-info">{{ $blog->category->title }}</span>
                        <p>{{ $blog->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Welcome
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hiiii</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Halooo Selamat datang
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </div>
@endsection