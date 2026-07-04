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

## Results

1. Portal
<img width="1155" height="799" alt="Screenshot 2026-07-04 at 3 32 49 PM" src="https://github.com/user-attachments/assets/a7bb1e4e-870c-411d-ba03-6b53be5b2cd3" />

2. Login (Similar for all portals)
<img width="1466" height="823" alt="Screenshot 2026-07-04 at 3 33 11 PM" src="https://github.com/user-attachments/assets/85582a90-81f2-41af-a4e1-921b64635994" />

3. Student Portal
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 33 47 PM" src="https://github.com/user-attachments/assets/aefebfe9-c6e8-4f88-8e6d-3b60378c4e2d" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 34 00 PM" src="https://github.com/user-attachments/assets/5514a02e-f998-41df-85c2-fa363aeab40e" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 34 08 PM" src="https://github.com/user-attachments/assets/4f319fd4-b470-4908-903a-2d80823bcdfb" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 34 18 PM" src="https://github.com/user-attachments/assets/2c2100c3-ab54-4754-b9f1-c18b97506816" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 34 27 PM" src="https://github.com/user-attachments/assets/191581ee-d611-498b-9b27-ed2d9e5f90da" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 34 34 PM" src="https://github.com/user-attachments/assets/ecd8a414-fb74-4b5b-8352-b6552b42b671" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 34 48 PM" src="https://github.com/user-attachments/assets/33ea29a6-18c1-4b0a-b002-8cd79c97b758" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 34 57 PM" src="https://github.com/user-attachments/assets/4a1fad14-309b-4800-b36e-6a5548709aa4" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 35 04 PM" src="https://github.com/user-attachments/assets/815cf5bc-d582-4dff-8776-54ba19346dc4" />

4. Faculty Portal
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 35 23 PM" src="https://github.com/user-attachments/assets/c563be2d-ef5b-432f-a924-b08c61415538" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 35 32 PM" src="https://github.com/user-attachments/assets/a298d594-cb5c-456a-a46b-71dc444603a3" />

5. Placement Cell Portal 
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 36 03 PM" src="https://github.com/user-attachments/assets/eb89afc2-a147-453b-af52-f79d4c3ce347" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 36 11 PM" src="https://github.com/user-attachments/assets/ba4346c8-3b37-4d2e-abdc-55556000c37a" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 36 17 PM" src="https://github.com/user-attachments/assets/c6e73503-7b6c-43fb-a83f-babb1a729bc9" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 36 26 PM" src="https://github.com/user-attachments/assets/4041f8c9-fcc8-4340-a0c0-3eaccbcc561f" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 36 32 PM" src="https://github.com/user-attachments/assets/2eb45dcc-2265-49d2-90bf-f5afd091cfb5" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 36 41 PM" src="https://github.com/user-attachments/assets/ce170595-ba3f-4e73-a67d-241963b998ac" />

6. Club Admin Portal
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 36 57 PM" src="https://github.com/user-attachments/assets/fffcbbb1-9394-4913-9a70-3ceb884023cb" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 37 26 PM" src="https://github.com/user-attachments/assets/d505cbc7-3c41-44a4-bb51-229833f5413e" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 37 04 PM" src="https://github.com/user-attachments/assets/dd3f37ff-37d3-4594-8f3a-f3f7d5796e69" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 37 11 PM" src="https://github.com/user-attachments/assets/0a9c3bf2-eba2-4f0b-873d-155beb93cd40" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 37 18 PM" src="https://github.com/user-attachments/assets/85bb7744-0d06-4867-8a14-501713d39791" />

7. Branch Admin Portal
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 37 42 PM" src="https://github.com/user-attachments/assets/fce83857-be9c-4fc5-89f1-a5acb5313e04" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 37 48 PM" src="https://github.com/user-attachments/assets/567caa2a-78a1-4137-b4a6-a83ffe8c3e72" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 37 57 PM" src="https://github.com/user-attachments/assets/c467f853-7aec-41dd-b61c-d01f6bfbca28" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 38 04 PM" src="https://github.com/user-attachments/assets/06c7d100-7a61-4ad4-aa65-cfca608d0617" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 38 11 PM" src="https://github.com/user-attachments/assets/a08d2204-3240-4f06-9907-3a6a0efb8845" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 38 18 PM" src="https://github.com/user-attachments/assets/2a2cb532-5fc4-44af-aef4-cb780181c919" />

8. Main Admin
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 38 36 PM" src="https://github.com/user-attachments/assets/43085a05-25c8-4f95-95ef-6e6e827dfc8f" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 38 42 PM" src="https://github.com/user-attachments/assets/daf0b984-e600-4604-a0cf-30a136a6870e" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 38 49 PM" src="https://github.com/user-attachments/assets/be89d74e-c309-4821-b926-4a31e9b0fd22" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 38 56 PM" src="https://github.com/user-attachments/assets/a042ac06-426f-4cc8-bd00-cd045ec44664" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 39 03 PM" src="https://github.com/user-attachments/assets/b1ce9319-b52c-49c0-b3bd-c2a0159dacaf" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 39 10 PM" src="https://github.com/user-attachments/assets/0658501d-86bf-417b-a40a-317e4390258f" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 39 17 PM" src="https://github.com/user-attachments/assets/ef81f79f-ffba-4981-84ea-463d8eee875e" />
<img width="1466" height="826" alt="Screenshot 2026-07-04 at 3 39 30 PM" src="https://github.com/user-attachments/assets/9a271d28-e7c9-4cc7-9419-4896c266ec1f" />
