@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <h1 class="text-center" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: #333;">Edit Student</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Student Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <input type="text" name="course" class="form-control" value="{{ $student->course }}" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" class="form-control" value="{{ $student->age }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                Update Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection