create table users(
    id int auto_increment primary key,
    name varchar(50) not null,
    password varchar(100) not null,
    email varchar(100) unique not null,
    role ENUM('admin','student') default 'student',
    created_at TIMESTAMP default CURRENT_TIMESTAMP 
);

create table students(
    student_id int auto_increment primary key,
    reg_no varchar(50) not null,
    user_id int,
    class varchar(50) not  null,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

create table attendances(
   attendances_id int auto_increment primary key,
   student_id int,
   attendances_date date,
   status ENUM('present','absent') default 'present',
   FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);



