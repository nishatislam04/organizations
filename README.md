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
    git clone https://github.com/nio04/organizations.git
    cd organizations
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
    npm run dev
    php artisan serve
    ```

---

## Screenshots

1. **Homepage View**
    ![Homepage View](resources/images/assets/view/homepage.png)

2. **Login View**
   ![Login view](resources/images/assets/auth/login.png)

3. **Register View**
   ![Register View](resources/images/assets/auth/resgister.png)

4. **Super User Dashboard View**
   ![Super User Dashboard View](resources/images/assets/dashboard/super_dashboard.jpg)

5. **Admin User Dashboard**
   ![Admin User Dashboard View](resources/images/assets/dashboard/admin_dashboard.png)

6. **Member User Dashboard**
   ![Member User Dashboard View](resources/images/assets/dashboard/member_dashboard.png)

7. **Organization Listings**
    ![Organization Listings](resources/images/assets/listings/organization_listings.jpg)

8. **Users Listings**
    ![User Listings](resources/images/assets/listings/users_listings.jpg)

9. **Subscription Listings**
    ![Subscription Listings](resources/images/assets/listings/subscription_listings.png)

10. **Installment View**
    ![Installment View](resources/images/assets/view/installment_view.png)

11. **Organization View**
    ![Organization View](resources/images/assets/view/organization_view.png)

12. **Member Installment Pay View**
    ![Member Insatllnent View](resources/images/assets/view/member_installment_payment.png)

---

## Future Updates

1. **Update Dashboard**
2. **Make Responsive**
3. **FB Login**
3. **Add Chart**
4. **Update ReadMe**

