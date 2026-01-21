# Riyadh Guide - N-Tier Web Application 🌴

**Riyadh Guide** is a dynamic web directory designed to showcase attractions in Riyadh, Saudi Arabia. This project was built to demonstrate proficiency in **N-Tier Architecture**, modular CSS, and PHP backend development.

##  Architectural Design (N-Tier)
The project is strictly organized into layers to ensure scalability and maintainable code:
* **Presentation Layer:** Dynamic UI built with PHP and HTML5, providing an interactive experience for users.
* **Logic/Application Layer:** Handles core functionalities such as:
    * User authentication (Admin Login).
    * Full CRUD operations (Add, Edit, Delete) for places via a secure Control Panel.
    * Review and rating system.
* **Data Access Layer:** Centralized database logic located in the `/data` folder, ensuring secure and consistent MySQL connections.

## 📁 Project Structure
The repository is structured to reflect professional development standards:
* `/src`: Core application pages (PHP).
* `/data`: Database connection logic (`db.php`).
* `/styles`: Modular CSS architecture following SMACSS principles (`base`, `layout`, `components`, `states`).
* `/Assets`: Media resources, including the site logo and place images.

##  Tech Stack
* **Backend:** PHP
* **Frontend:** HTML5, CSS3 (Modular Architecture)
* **Database:** MySQL
* **Tools:** N-Tier Architecture, CRUD Operations.

## 🔒 Security Best Practices
* **Environment Safety:** Database credentials in `db.php` are replaced with placeholders for public repository safety.
* **Code Organization:** Separation of concerns between the UI and database logic to prevent unauthorized data access.

##  Future Improvements
-  Implementation of **Prepared Statements** to prevent SQL Injection.
-  Password hashing for admin accounts.
-  Responsive design for mobile devices.

---
*Developed as part of University Coursework | Information Technology Specialist.*
