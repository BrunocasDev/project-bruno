@extends('layout.template')

@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <h1 class="mb-0 text-white">
                        {{ isset($contact) ? 'Edit Contact' : 'Create Contact' }}
                    </h1>
                </div>
                <form action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.create') }}"
                    method="POST">
                    @csrf
                    @if (isset($contact))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label text-white">Name</label>
                            <span class="text-danger">*</span>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', isset($contact) ? $contact->name : '') }}">
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="contact" class="form-label text-white">Contact</label>
                            <span class="text-danger">*</span>
                            <input type="text" name="contact" id="contact" class="form-control"
                                value="{{ old('contact', isset($contact) ? $contact->contact : '') }}">
                            @error('contact')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <span class="text-danger">*</span>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', isset($contact) ? $contact->email : '') }}">
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
