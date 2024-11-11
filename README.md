# Organization Management System

A Laravel-based organization management application with role-based access (Super, Admin, and Member). The Super user can create and manage organizations, set up subscription plans, and track installment payments, while Admins manage assigned organizations and Members can join and pay installments with automated penalty checks for overdue payments.

---

## Project Overview

The Organization Management System simplifies managing multiple organizations with distinct roles and access levels. This application ensures structured access, tracks membership dues and installment payments, and supports seamless subscription management, making it ideal for organizations with flexible membership and billing needs.

---

## Features

- **Role-Based Access Control**: Define Super, Admin, and Member roles with specific permissions.
- **Organization and Subscription Management**: Super users create organizations and subscription plans (monthly or yearly) with flexible installment options.
- **Installment and Payment Tracking**: Tracks member payments and calculates penalties for overdue installments.
- **Dashboard and Reporting**: Interactive dashboard to view payment history and installment status for members.
- **Authentication & Authorization**: Secure access with user authentication, Google login, and authorization layers.
- **Additional Functionalities**: Form validation, email notifications, CRUD operations, and file uploads.

---

## Technology Stack

- **Backend**: Laravel, Livewire, MySQL
- **Frontend**: Tailwind CSS, Alpine.js
- **Additional Tools**: Vite, SVG Icons, Nginx, Gmail API integration
- **Deployment**: Virtual Host, Git version control

---

## Installation

1. **Clone the Repository**
    ```bash
    git clone https://github.com/your-username/organization-management-system.git
    cd organization-management-system
    ```

2. **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3. **Set Up Environment Variables**
    - Create a `.env` file by copying `.env.example`:
    ```bash
    cp .env.example .env
    ```
    - Configure database and mail settings in `.env`.

4. **Run Migrations and Seeders**
    ```bash
    php artisan migrate --seed
    ```

5. **Run the Application**
    ```bash
    php artisan serve
    ```

---

## Screenshots

1. **Dashboard View**
   ![Dashboard View](path/to/dashboard-screenshot.png)

2. **Subscription Management**
   ![Subscription Management](path/to/subscription-screenshot.png)

3. **Installment Payment History**
   ![Payment History](path/to/payment-history-screenshot.png)

*Add your screenshots in the `assets` directory of your project, and reference them as shown above.*

---

## Future Updates

1. **Extend Payment Gateway Integration**
2. **Additional Subscription Types**
3. **Detailed Reporting and Analytics**

---

## Contributing

Contributions are welcome! If you’d like to add features or fix issues, please fork the repository and make a pull request.

---

