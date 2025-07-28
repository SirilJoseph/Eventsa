# Event-Ease

A minimal PHP-based event management prototype. Users can register, log in and book events. Payments use Razorpay.

## Setup

1. Import `init.sql` into MySQL to create required tables.
2. Configure database credentials in `server/db.php`.
3. Replace `YOUR_RAZORPAY_KEY` in `pay.php` with your Razorpay key.
4. Serve the project via PHP's built-in server:
   ```bash
   php -S localhost:8000
   ```

This project is a starting point and not production ready.
