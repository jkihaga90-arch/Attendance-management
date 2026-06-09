
# Student Attendance Management System

A web-based Student Attendance Management System developed using PHP, MySQL, HTML, CSS, and JavaScript. The system helps administrators manage students and track attendance records efficiently.

## Features

- User Authentication (Admin Login)
- Student Management
  - Add Students
  - View Students
  - Update Student Information
  - Delete Students
- Attendance Management
  - Mark Attendance
  - Record Present and Absent Students
- Attendance Reports
  - View Attendance Records
  - Filter Attendance by Date
- Secure Session Management
- Responsive User Interface

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP

## System Modules

### 1. Authentication Module
Allows administrators to log in securely before accessing the system.

### 2. Student Management Module
Enables administrators to manage student records.

### 3. Attendance Management Module
Allows attendance to be recorded for students on a daily basis.

### 4. Reporting Module
Generates attendance reports and allows filtering by date.

## Database Tables

### Users
- id
- name
- email
- password
- role

### Students
- student_id
- user_id
- class
- gender

### Attendances
- id
- student_id
- date
- status

## Installation

1. Clone the repository

```bash
git clone https://github.com/your-username/student-attendance-system.git
```

2. Move the project folder to:

```text
xampp/htdocs/
```

3. Create a MySQL database.

4. Import the SQL database file.

5. Configure database connection in:

```php
connection/db_connection.php
```

6. Start Apache and MySQL from XAMPP.

7. Open the project in your browser:

```text
http://localhost/student-attendance-system
```

## Future Improvements

- Parent Portal
- Student Portal
- Attendance Statistics Dashboard
- PDF Report Generation
- Email Notifications
- Multi-Class Support

## Author

Jenifa Kihaga

## License

This project is developed for academic and learning purposes.
