@extends('layouts.app')

@section('content')
    @php
        $i = 1;
    @endphp

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-content-center">
                        <h2 class="text-bg-info">Events</h2>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th>ID</th> --}}
                                    <th>Event</th>
                                    <th>user</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($audits->count() > 0)
                                    @foreach ($audits as $audit)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            {{-- <td>{{ $audit->id }}</td> --}}
                                            <td>{{ $audit->event }}</td>
                                            <td>{{ $audit->user_id }}</td>
                                            <td>{{ $audit->created_at }}</td>
                                            <td>
                                                <a href="{{ route('audits.show', $audit->id) }}" class="btn btn-primary"><i
                                                        class="fa-solid fa-binoculars"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No data yet!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-center align-content-lg-center">
                            {{ $audits->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
