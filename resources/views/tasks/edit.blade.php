<!DOCTYPE html>
<html>

<head>
    <title>Edit Task</title>
</head>

<body>
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $task->name }}" required>
        <label>Priority:</label>
        <input type="number" name="priority" value="{{ $task->priority }}" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>
