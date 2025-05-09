@extends('layouts.app')

@section('content')
<div class="container my-4">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <h1 class="text-center" style="font-family: 'Roboto', sans-serif; font-weight: bold; color: rgb(0, 0, 0); margin-bottom: 35px;">Students List</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <a href="{{ route('students.create') }}" class="btn btn-primary me-2">
                <i class="fas fa-plus"></i> Add New
            </a>

            <!-- Sort Dropdown -->
            <form id="sortForm" class="form-inline me-2" style="width: 150px;">
                <select id="sortSelect" name="sort_by" class="form-control" onchange="this.form.submit()">
                    <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Sort by ID</option>
                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Sort by Name</option>
                </select>
            </form>
        </div>

        <!-- Search Form -->
        <form id="searchForm" style="width: 250px;">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by name or course" style="height: 38px; padding-right: 40px;">
                <i class="fas fa-search" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
            </div>
        </form>
    </div>
    

    <table class="table table-bordered table-striped" id="studentsTable">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($students->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">No students found.</td>
                </tr>
            @else
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

   <!-- Display Total Count -->
    <div class="mb-3">
        <strong>Total Students: {{ $students->count() }}</strong>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('students.index') }}",
                type: "GET",
                data: { search: query },
                success: function(data) {
                    $('#studentsTable tbody').html(data);
                }
            });
        });
    });
</script>
@endsection