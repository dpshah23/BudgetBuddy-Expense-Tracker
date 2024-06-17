# Budget Buddy - Expense Tracker

Welcome to the Expense Tracker project, a robust and user-friendly application designed to help users manage their finances. This PHP-based application allows users to sign up, log in, add expenses, add income, view category-wise expense breakdowns through pie charts, and generate comprehensive reports for both income and expenses.

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation and Setup](#installation-and-setup)
- [Usage](#usage)
- [Database Setup](#database-setup)


## Features

- **User Authentication**: Secure user signup and login.
- **Add Expenses**: Record and categorize expenses.
- **Add Income**: Record income entries.
- **Expense Analysis**: View expenses in a pie chart categorized by type.
- **Financial Reports**: Generate detailed reports for both income and expenses.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- A web server with PHP support (e.g., Apache)
- MySQL or MariaDB server
- PHP and MySQL installed on your system

## Installation and Setup

1. Clone the repository:
   ```sh
   git clone https://github.com/dpshah23/expense-tracker.git
   cd expense-tracker
   ```

2. Move the project files to your web server's root directory. For example, if you're using XAMPP, move the files to `C:/xampp/htdocs/expense-tracker`.

3. Create a virtual host configuration for the project (optional but recommended for development).

4. Configure the database connection:
   - Open `config.php` and update the database settings:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'your_db_username');
     define('DB_PASSWORD', 'your_db_password');
     define('DB_NAME', 'expense_tracker');
     ```

## Database Setup

1. Create a new database named `expense_tracker`.

2. Import the provided SQL file to set up the necessary tables:
   ```sh
   mysql -u your_db_username -p expense_tracker < path/to/your/sqlfile.sql
   ```
   Alternatively, you can use a tool like phpMyAdmin to import the SQL file.

## Usage

- **Signup and Login**: Access the application through your web browser. Use the signup page to create a new account and the login page to access your account.
- **Add Expense**: Navigate to the "Add Expense" section to record your expenses. Select the appropriate category for each expense.
- **Add Income**: Navigate to the "Add Income" section to record your income.
- **View

 Expense Breakdown**: Navigate to the "Dashboard" or "Reports" section to view a pie chart of your expenses categorized by type.
- **Generate Reports**: Use the "Reports" section to generate detailed reports for both your income and expenses over specified time periods.

