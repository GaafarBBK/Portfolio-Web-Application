<a id="readme-top"></a>

<br />
<div align="center">
  
<h3 align="center">Admin Dashboard for Web Development Course</h3>

  <p align="center">
   <br />
  
  </p>
</div>

## Information

### Features
<ul>
<li>Adding users to the system.</li>
<li>Managing users in the system (removing, editing).</li>
<li>Travel news.</li>
</ul>

### Built With
[![Tailwind][TailwindCSS]][Tailwind-url]
[![MySQL][MySQL.com]][MySQL-url]
[![SQLite][SQLite.org]][SQLite-url]
[![JWT][JWT-Auth]][JWT-Auth-url]
[![Flutter][Flutter.dev]][Flutter.dev-url]

### Additional notes
Late submission was due to the Github servers being down.

The server is on Mohamed Gaafar's PC, when you want to turn it on contact me (contact details below)

## Installation & Setup

### Frontend (Flutter)

1. Clone the repo
   ```sh
   git clone https://github.com/GaafarBBK/captain.git
   ```

2. Run pub get
   ```sh
   flutter pub get
   ```

### Backend (Laravel)

Github Repository: https://github.com/GaafarBBK/captain-backend

1. Clone the repo
   ```sh
   git clone https://github.com/GaafarBBK/captain-backend.git
   ```

2. Navigate to the backend directory and install dependencies
   ```sh
   composer install
   ```

3. Generate the app key
   ```sh
   php artisan key:generate
   ```

4. Set up the database and run migrations
   ```sh
   php artisan migrate
   ```

5. Run the backend server
   ```sh
   php artisan serve
   ```

### Testing

- **APK for Testing**: [Download APK](./flutter-apk/app-release.apk) to test the mobile app.
  
- **API Testing**: Use the provided [Postman Collection](./postman/Captain.postman_collection.json) for easy backend testing and validation of API endpoints (contact Mohamed Gaafar).

## Contact

<ul>
  <li>Mohamed Gaafar - mohamedgaafar80@gmail.com (+218918709848)</li>
  <li>Abdulrahman Rushdie - bdwm83249@gmail.com</li>
</ul>

[TailwindCSS]: https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white
[Tailwind-url]: https://tailwindcss.com/

[SQLite.org]: https://img.shields.io/badge/Sqlite-003B57?style=for-the-badge&logo=sqlite&logoColor=white
[SQLite-url]: https://www.sqlite.org/

[JWT-Auth]: https://img.shields.io/badge/JWT-000000?style=for-the-badge&logo=JSON%20web%20tokens&logoColor=white
[JWT-Auth-url]: https://jwt-auth.readthedocs.io/en/develop/

[MySQL.com]: https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white
[MySQL-url]: https://www.mysql.com/

[Flutter.dev]: https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white
[Flutter.dev-url]: https://flutter.dev/
