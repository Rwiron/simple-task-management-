<!DOCTYPE html>
<html>

<head>
    <title>Create Task</title>
</head>

<body>
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Priority:</label>
        <input type="number" name="priority" required>
        <button type="submit">Create</button>
    </form>
</body>

</html>
