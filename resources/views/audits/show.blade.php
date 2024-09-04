@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-content-center">
                        <h2 class="text-bg-info">Audit ID: "{{ $audit->id }}"</h2>

                        <a href="{{ route('audits.index') }}" class="btn btn-outline-info">
                            <i class="fas fa-angle-left"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form class="form d-flex">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="event">Event</label>
                                            <input type="text" class="form-control" id="event" name="event"
                                                value="{{ $audit->event }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="auditable_type">Auditable Type</label>
                                            <input type="text" class="form-control" id="auditable_type"
                                                name="auditable_type" value="{{ $audit->auditable_type }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="auditable_id">Auditable ID</label>
                                            <input type="text" class="form-control" id="auditable_id" name="auditable_id"
                                                value="{{ $audit->auditable_id }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_id">User ID</label>
                                            <input type="text" class="form-control" id="user_id" name="user_id"
                                                value="{{ $audit->user_id }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_id">User Name</label>
                                            <input type="text" class="form-control" id="user_id" name="user_id"
                                                value="{{ $audit->user->name }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="old_values">Old Values</label>
                                    <textarea type="text" class="form-control" id="old_values" name="old_values" readonly>{{ json_encode($audit->old_values, JSON_PRETTY_PRINT) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="new_values">New Values</label>
                                    <textarea type="text" class="form-control" id="new_values" name="new_values" readonly>{{ json_encode($audit->new_values, JSON_PRETTY_PRINT) }}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
