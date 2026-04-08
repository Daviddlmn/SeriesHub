📺 Series Club Web Application (PHP MVC)

This project is a web application developed in PHP using the MVC (Model-View-Controller) architecture, designed for a TV series fan club to manage content and interact with its members.

🔍 Overview

The application allows a club dedicated to TV series to manage:

Streaming platforms
TV series
Release dates per platform
Member accounts
User comments on series

Its main goal is to enhance interaction between the club and its members, providing a centralized platform where content can be published and discussed.

🧱 Architecture

The project follows the MVC design pattern:

Models: Handle database logic and data operations (CRUD, queries, authentication, etc.)
Views: Responsible for the user interface
Controllers: Manage application flow and connect models with views
👥 User Roles
🔑 Administrator

The admin has full control over the system and can:

Manage Series (create, update, deactivate, search)
Manage Platforms (create, update, search)
Manage Members (create, update, deactivate, search)
Manage Releases (create, update, delete)
Moderate Comments (delete)
🙋 Member (Socio)

Registered users can:

Browse series and platforms
View detailed information about each series
Read comments from other members
Add one comment per series
Delete their own comments

Note: Users cannot self-register. Only administrators can create member accounts.

🌐 Main Features
🏠 Homepage displaying:
Latest releases per platform
Recent comments (carousel)
📺 Series listing grouped by platform
📡 Platform-based filtering of series
🔍 Search functionality (series, platforms, members)
🔐 Authentication and role-based access control
💬 Comment system with restrictions per user
🗃️ Soft delete for most entities (data is not permanently removed)
🗄️ Database Design

The application uses a relational database with the following main entities:

Platforms
Series
Releases (many-to-many relation with date)
Members
Comments
⚙️ Technical Details
Developed with PHP & MySQL
Structured following MVC principles
Includes:
SQL injection prevention
Error handling
Organized folder structure
Entry point via index.php
🎯 Purpose

This project was developed as part of a Web Development (Server-side) course, with the objective of applying MVC architecture in a real-world scenario.