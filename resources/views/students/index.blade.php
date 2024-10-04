<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
<h1>Danh sách sinh viên</h1>
<a href="{{ route('students.create') }}">Thêm sinh viên mới</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Ngày sinh</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->date_of_birth }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
