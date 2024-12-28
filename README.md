# Resort Reservation System

This project is a streamlined platform for managing resort bookings and reservations. The system provides features for both users and administrators, making it a solution for resort management. This reservation system is part of our freelance work and was intended to be used for a convention center of registrar around Region IV-A, Philippines.

## Features
### User Dashboard
- **Account Registration**: Users can register and create their accounts.
- **Room Selection**: Choose from available rooms or cabins based on availability.
- **Payment Proof Upload**: Attach a receipt as proof of payment via GCASH.
- **Data Storage**: Reservation details are securely stored for future processing.

### Admin Dashboard
- **Check-in and Check-out Management**: Admins can confirm check-ins or cancel reservations as needed.
- **Email Confirmation**: Automatically sends a confirmation email to users upon successful check-in.
- **Report Generation**: Print reports showing the current number of occupants in specific rooms or cabins.

## Technologies Used
- **Backend**: PHP (Pure, No Framework)
- **Frontend**: HTML, CSS, and Bootstrap
- **FPDF**: Used for generating printable reports.
- **Google reCAPTCHA**: Implemented for human confirmation during account registration and form submissions.

## Getting Started
To run the system, follow these steps:
1. Clone or download the repository to your local environment.
2. Extract the source code and set it up in a local server environment (e.g., XAMPP, WAMP, or LAMP).
3. Import the SQL file provided in the repository to generate the necessary database tables.
4. Configure the `connection.php` file with your database credentials.
5. Extract the `code_files` directory from the repository and place its contents outside the folder for proper application structure.
6. Modify the database connection settings in the application to match your environment.


Thank you for exploring the **Resort Reservation System**! If you encounter any issues or have suggestions for improvement, feel free to contact us or submit an issue in the repository.
