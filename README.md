# Laravel-Notifications&&Fortify-Multi-Auth

Laravel-Notifications-Fortify-Multi-Auth is a Laravel multi-auth project utilizing Fortify, tailored to provide a robust notification system through the database. This project is designed to offer seamless authentication for both users and administrators, facilitating secure access to distinct functionalities while ensuring efficient communication through notifications.

## Key Features

1. **Multi-Authentication System:** The project incorporates Laravel Fortify to implement a multi-authentication system. Users and administrators have separate authentication portals, ensuring appropriate access control.

2. **User and Admin Management:** The project includes dedicated tables for users and administrators, enabling efficient management of user roles and permissions.

3. **Database-Driven Notifications:** Notifications are automatically triggered when a new user is added to the system, alerting the administrator via the notification dashboard. The project leverages the database to store and manage these notifications, ensuring reliable delivery and persistence, enhancing user engagement, and system reliability.


## Usage

1. Clone the repository: `git clone https://github.com/ABDOKARAM22/Laravel-Notifications-Fortify-Multi-Auth.git`
2. Install dependencies: `composer install`
3. Set up the database configuration in `.env` file.
4. Run migrations: `php artisan migrate`
5. Serve the application: `php artisan serve`
6. Access the application via the provided URL and explore the multi-authentication and notification features.

## Contributing

Contributions to The project are welcome! Whether it's bug fixes, feature enhancements, or documentation improvements, feel free to submit pull requests. Please follow the established coding standards and guidelines when contributing.
