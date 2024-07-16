# Task Manager

## Description

This is a simple task management application built with Laravel by Wiron R. The application allows you to create, edit, delete, and reorder tasks. Tasks are saved in a MySQL database.

## Requirements

-   PHP >= 8.2
-   Composer
-   MySQL
-   Laravel Framework 11.14

## Installation

1. **Clone the repository:**

    ```sh
    git clone https://github.com/yourusername/task-manager.git
    cd task-manager
    ```

2. **Install dependencies:**

    ```sh
    composer install
    ```

3. **Create a `.env` file:**

    Copy the example `.env` file and configure your database settings.

    ```sh
    cp .env.example .env
    ```

    Update the `.env` file with your MySQL database information:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=task_db
    DB_USERNAME=root
    DB_PASSWORD=yourpassword
    ```

4. **Generate an application key:**

    ```sh
    php artisan key:generate
    ```

5. **Run migrations:**

    ```sh
    php artisan migrate
    ```

6. **Serve the application:**

    ```sh
    php artisan serve
    ```

    Open your browser and visit `http://127.0.0.1:8000` to see the application in action.

## Features

-   **Create Task:**
    -   Allows you to create a new task with a name and priority.
-   **Edit Task:**
    -   Edit existing tasks to update their name and priority.
-   **Delete Task:**
    -   Delete tasks from the list.
-   **Reorder Tasks:**
    -   Drag and drop tasks to reorder them. The priority is updated automatically.
-   **Bonus: Project Functionality:**
    -   (Optional) Add projects and associate tasks with projects. View tasks by selected project.

## Folder Structure

-   **app/Http/Controllers/TaskController.php:**
    -   Contains the controller logic for managing tasks.
-   **app/Models/Task.php:**
    -   The Task model that interacts with the database.
-   **database/migrations/xxxx_xx_xx_create_tasks_table.php:**
    -   Migration file for creating the tasks table.
-   **resources/views/tasks/:**
    -   Blade templates for listing, creating, and editing tasks.
-   **routes/web.php:**
    -   Routes for the task management application.

## Additional Information

-   **Reorder Tasks:**
    -   Reordering tasks is implemented using jQuery UI for drag-and-drop functionality.
    -   When tasks are reordered, an AJAX request updates the task priorities in the database.

## License

This project is open-source and available under the [MIT license](LICENSE).
