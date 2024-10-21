# Laravel Shipping Label Application

This is a simple Laravel 11 application for generating shipping labels. Currently, it has no database integration, as it was not required for this version.

## Features

- Access the shipping label generation at `/shipping-label`.
- Lightweight application for development purposes.
- No database integration (yet).

## Getting Started

### Prerequisites

Make sure you have the following installed on your machine:

- PHP 8.2+
- Composer
- Laravel 11

### Installation

1. Clone the repository:
   ~~~bash
   git clone <your-repo-url>
   cd <your-repo-directory>
   ~~~

2. Install dependencies:
   ~~~bash
   composer install
   ~~~

3. Start the development server:
   ~~~bash
   php artisan serve
   ~~~

4. Access the shipping label generator at:
   ~~~
   http://localhost:8000/shipping-label
   ~~~

### Environment Configuration

For local development, create a `.env` file by copying the example file:
~~~bash
cp .env.example .env
~~~
Then update any necessary environment variables (e.g., `APP_URL`, `APP_ENV`).

## Improvements & Goals

1. **Work Fully with Livewire**  
   Migrate the current functionality to Laravel Livewire for better user interaction without page reloads.

2. **Make PDF Generation More Generic**  
   Refactor the existing PDF generation to allow more customizable and flexible templates, usable in different parts of the application.

3. **Add Addresses to the Database**  
   Integrate a database to store and reuse shipping addresses, improving efficiency and reducing repetitive input.

---
