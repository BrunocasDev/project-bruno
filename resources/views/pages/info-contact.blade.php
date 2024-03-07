@extends('layout.template')

@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <h1 class="mb-0 text-white">
                        Info Contact
                    </h1>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="name" class="form-label text-white">Name:</label>
                        <span class="text-white">{{ $contactInfo->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="contact" class="form-label text-white">Contact:</label>
                        <span class="text-white">{{ $contactInfo->contact }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="email" class="form-label text-white">Email:</label>
                        <span class="text-white">{{ $contactInfo->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
