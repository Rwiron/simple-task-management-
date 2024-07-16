<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <h1>Task Manager</h1>
    <a href="{{ route('tasks.create') }}">Create Task</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Priority</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="sortable">
            @foreach ($tasks as $task)
                <tr data-id="{{ $task->id }}">
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    let priorities = $(this).sortable('toArray', {
                        attribute: 'data-id'
                    });
                    $.ajax({
                        url: '{{ route('tasks.reorder') }}',
                        method: 'POST',
                        data: {
                            priorities: priorities,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
