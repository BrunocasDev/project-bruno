@extends('layout.template')

@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <h1 class="mb-0 text-white">List Contacts</h1>
                </div>
                @if (Auth::check())
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-auto text-end float-end ms-auto">
                                <a href="{{ route('contacts.createView') }}"
                                    class="btn btn-primary d-flex align-items-center">
                                    <i class="lni lni-plus me-2"></i>
                                    Add Contact
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                <table class="table align-middle mb-0 table-custom mt-4">
                    <thead>
                        <tr>
                            <th class="text-white">Name</th>
                            <th class="col-sm-2 text-white">Actions</th>
                        </tr>
                    </thead>
                    @forelse ($contacts as $contact)
                        <tbody>
                            <tr>
                                <td class="text-white">{{ $contact->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-link btn-sm btn-rounded text-decoration-none"
                                            title="View">
                                            <a href="{{ route('contacts.view', $contact->id) }}">
                                                <i class="lni lni-eye"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded text-decoration-none"
                                            title="Edit">
                                            <a href="{{ route('contacts.edit', $contact->id) }}">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                        </button>
                                        <form action="{{ route('contacts.delete', $contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-link btn-sm btn-rounded text-decoration-none" title="Delete">
                                                <a href="#">
                                                    <i class="lni lni-trash-can"></i>
                                                </a>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @empty
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center align-middle text-white">There are no contacts available</td>
                            </tr>
                        </tbody>
                    @endforelse
                </table>
                @include('components.toast')
            </div>
        </div>
    </div>
@endsection
