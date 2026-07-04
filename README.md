# IMS-Laravel

IMS-Laravel is a role-based institutional management system built with Laravel. It provides separate portals for students, faculty, branch administrators, placement cell users, club admins, and system administrators.

## Key Features

- **Role-based access**
  - Student portal
  - Faculty portal
  - Branch admin portal
  - Placement cell portal
  - Club admin portal
  - System admin portal

- **Student portal**
  - Portal selection page with clean role cards
  - Dashboard with announcements, placement drives, and achievement status summaries
  - Help Desk for raising and tracking support tickets
  - Academic records and achievement submission flow
  - Placement drive browsing and job application
  - Profile management with branch and roll number data

- **Faculty portal**
  - Verification pipeline for student achievements
  - Branch-specific review queue based on assigned branch
  - Advanced filtering for academic year, semester, division, status, and reviewer
  - Approve or reject submissions with remarks

- **Placement cell portal**
  - Create and manage placement job drives
  - Review applications and update statuses
  - Track student placement activity

- **Club admin portal**
  - Create and manage club events
  - Track registrations, attendance, and certificates
  - Publish club announcements

- **Branch admin portal**
  - Manage branch students and faculty
  - Publish branch-specific notices
  - View branch statistics, pending requests, and reports

- **Admin portal**
  - Manage users and roles
  - Create faculty and branch admin accounts
  - Publish global announcements

## Installation

1. Clone the repository:

```bash
git clone <repository-url> ims-laravel
cd ims-laravel
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install JavaScript dependencies:

```bash
npm install
```

4. Copy the environment file and configure:

```bash
cp .env.example .env
php artisan key:generate
```

5. Set database credentials in `.env`, then run migrations:

```bash
php artisan migrate
```

6. If needed, seed data:

```bash
php artisan db:seed
```

7. Build frontend assets:

```bash
npm run dev
```

8. Start the local development server:

```bash
php artisan serve
```

## Default User Setup

If your project seeds demo users, check `database/seeders/DatabaseSeeder.php` for default credentials.

| Role | Username | Password |
| --- | --- | --- |
| Admin | `admin` | `admin123` |
| Faculty | `faculty001` | `faculty123` |
| Student | `student001` | `student123` |
| Placement Cell | `placement001` | `placement123` |
| Club Member | `clubmember001` | `clubmember123` |
| Club Admin | `clubadmin001` | `clubadmin123` |
| Branch Admin | `branchadmin001` | `branchadmin123` |

## Project Structure

- `app/Http/Controllers/` — controller logic for each portal and feature
- `app/Models/` — Eloquent models, including `HelpTicket`, `StudentProfile`, `Achievement`, and user roles
- `resources/views/` — Blade templates for student, faculty, admin, branch, club, and placement portals
- `routes/web.php` — application routes and role-based middleware groups
- `database/migrations/` — schema definitions for users, help tickets, achievements, and other entities

## Notes

- Student help tickets are stored in `help_tickets` and displayed on the student dashboard.
- Faculty users only see submissions for their assigned branch.
- The student dashboard contains a help desk tab, academic records, placement, and submission workflows.

## License

This project is licensed under the MIT License.

## Results