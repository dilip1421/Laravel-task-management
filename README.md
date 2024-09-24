#Task Management System
This is a simple Task Management System built with Laravel. It allows users to register, log in, and manage their tasks efficiently. Each user can create, edit, and delete tasks, with privacy ensuring that only the logged-in user can access their own tasks.

#Features
User Registration and Login: Users can create an account and securely log in to manage their tasks.

Task Management: Logged-in users can:
                  -Create new tasks.
                  -Edit existing tasks.
                  -Delete tasks.

User Privacy: Each user's tasks are private, meaning no other user can view or modify another user's tasks.

Tags: Tasks can be tagged for easier categorization and filtering.

Due Date: Each task can have a due date to help users keep track of deadlines.

#Installation
  composer install
  php artisan migrate
  php artisan serve
