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