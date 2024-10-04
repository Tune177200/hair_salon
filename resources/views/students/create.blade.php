<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên mới</title>
</head>
<body>
<h1>Thêm sinh viên mới</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Tên:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="date_of_birth">Ngày sinh:</label>
        <input type="date" name="date_of_birth" id="date_of_birth">
    </div>
    <button type="submit">Lưu</button>
</form>
</body>
</html>
