@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Anggota</h1>
    <form action="{{ route('anggotas.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.anggotas.form', ['anggota' => $anggota])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection