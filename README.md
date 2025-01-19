# Task Manager

A powerful and user-friendly task management application built with **Laravel**. It provides a streamlined interface to organize, prioritize, and track tasks efficiently.

## Features

- **User Authentication**: Secure login and registration.
- **Task Management**: Create, update, and delete tasks.
- **Task Prioritization**: Set priorities for better task organization.
- **Task Status Tracking**: Track progress with statuses like Pending, In Progress, and Completed.
- **Due Dates**: Assign due dates to tasks and get reminders.
- **Search and Filtering**: Quickly find tasks using search and filters.

## Installation

### Prerequisites

Make sure you have the following installed:

- PHP >= 7.3
- Composer
- MySQL or another supported database
- Node.js and npm

### Steps

1. Clone the repository:
   ```
   git clone https://github.com/username/task-manager.git
   cd task-manager
   ```
2. Install dependencies:
   ```
   composer install
   npm install
   npm run dev
   ```
3. Configure the environment:
   - Copy `.env.example` to `.env`:
     ```
     cp .env.example .env
     ```
   - Set your database and application configurations in `.env`.
4. Generate the application key:
   ```
   php artisan key:generate
   ```
5. Run migrations:
   ```
   php artisan migrate
   ```
6. Start the development server:
   ```
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000` in your browser.

## Usage

1. Register a new account or log in.
2. Create a task by clicking on the "New Task" button.
3. Set a priority, status, and due date for better task management.
4. View, edit, or delete tasks as needed.

## Screenshots

(Add screenshots of your application here to showcase the UI and functionality.)

## Technologies Used

- Laravel - Backend framework.
- MySQL - Database.
- Bootstrap - Frontend framework for responsive design.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request.
