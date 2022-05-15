@extends('layouts.app')

@section('title', 'Groups')

@section('content')

    <div class="text-danger">*Run Tailwind = npm run Dev</div>
    <a href="/groups/create" class="btn btn-primary mb-2">Tambah Group</a>
    <div class="mx-auto container">
        <div class="d-flex">
            @foreach ($groups as $group)
                <div class="card mt-2 mb-2 me-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/groups/{{ $group['id'] }}">
                                {{ $group['nama_grup'] }}
                            </a></h5>
                        <p class="card-text">{{ $group['description'] }}</p>
                        <a href="/groups/{{ $group['id'] }}/edit" class="card-link btn btn-warning">Edit Group</a>
                        <hr>
                        <a href="/groups/create" class="btn btn-primary mb-2">Tambah Anggota Group</a>
                        @foreach ($group->friends as $friend)
                            <li>{{ $friend->nama }}</li>
                        @endforeach
                        <form action="/groups/{{ $group['id'] }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="card-link btn btn-danger">Delete Group</button>

                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="justify-center">{{ $groups->links() }}</div>
    </div>
@endsection
