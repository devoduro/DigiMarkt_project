# Digital Marketing Web Platform

A modern, responsive, and elegant web platform modeled after the structure and aesthetics of digimarkt.aamusted.edu.gh. The system includes a secure Admin Dashboard/Portal and enforces user authentication for accessing sensitive content, especially downloadable documents under "Deliverables and Milestones."

## Features

- Mobile-first responsive design
- Secure authentication system with role-based access control
- Admin dashboard for content management
- Protected downloadable resources
- Modern UI with gradient green, black, and white color scheme

## Technology Stack

- **Frontend**: HTML5, Tailwind CSS, JavaScript (Alpine.js)
- **Backend**: PHP Laravel Framework
- **Database**: MySQL
- **Architecture**: MVC pattern with RESTful API

## Installation

1. Clone the repository
2. Configure your web server (Apache/Nginx) to point to the `public` directory
3. Import the database schema from `database/schema.sql`
4. Copy `.env.example` to `.env` and configure your environment variables
5. Run `composer install` to install PHP dependencies
6. Run `npm install` to install frontend dependencies
7. Run `npm run dev` to compile assets

## Security Features

- Role-Based Access Control (RBAC)
- Two-Factor Authentication (2FA)
- Data encryption
- CSRF protection
- Input validation and sanitization
