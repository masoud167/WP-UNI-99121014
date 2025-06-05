# Final Exam Web Programming Project

This is a PHP-based web application built using the MVC structure. It includes user-post relationships, related post modeling, and post ranking simulation.


# Features

- Student registration form (with validaation)
- Alphabetical student listing
- Dummy post generation (5–7 per student)
- Random related posts per post
- Random post views (20–50 per post)
- Matrix A computation for post relationships
- Power Method for post ranking

## Installation

1. Install [XAMPP](https://www.apachefriends.org/)
2. Clone this repo to `C:\xampp\htdocs\FinalExam`
3. Import the provided SQL file (`exam_project_db`) in phpMyAdmin
4. Start Apache and MySQL in XAMPP
5. Visit: `http://localhost/FinalExam/public/`

## Structure

- public/           → Entry point (index.php)
- controllers/      → MVC controllers (User, Post, etc.)
- models/           → Database models
- views/            → HTML + Bootstrap views
- config/           → DB connection file
- assets/           → CSS

## Test Routes

- Register student:       ?action=register
- View student list:      ?action=users
- Generate posts:         ?action=generate_posts
- Generate relations:     ?action=generate_relations
- Generate views:         ?action=generate_views
- Rank posts:             ?action=rank_posts

