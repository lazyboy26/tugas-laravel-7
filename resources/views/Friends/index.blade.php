@extends('layouts.app')

@section('title', 'Friends')

@section('content')

    <div class="text-danger">*Run Tailwind = npm run Dev</div>
    <a href="/friends/create" class="btn btn-primary mb-2">Tambah Teman</a>
    <div class="mx-auto container">
        <div class="d-flex">
            @foreach ($friends as $friend)
                <div class="card mt-2 mb-2 me-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/friends/{{ $friend['id'] }}">
                                {{ $friend['nama'] }}
                            </a></h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $friend['no_tlpn'] }}</h6>
                        <p class="card-text">{{ $friend['alamat'] }}</p>
                        <a href="/friends/{{ $friend['id'] }}/edit" class="card-link btn btn-warning">Edit Teman</a>

                        <form action="/friends/{{ $friend['id'] }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="card-link btn btn-danger">Delete Teman</button>

                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="justify-center">{{ $friends->links() }}</div>
    </div>
@endsection
