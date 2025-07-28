# WhatsApp Message API

A simple and extensible PHP application for sending WhatsApp messages using the Meta (Facebook) Graph API.  
This project demonstrates a basic web interface for sending WhatsApp messages, with clean code separation, robust error handling, and a structure designed for scalability and easy extension.

---

## Features

- **Web Form**: User-friendly HTML form for sending WhatsApp messages.
- **API Integration**: Connects to the official WhatsApp API via the Meta Graph API.
- **Input Validation**: Validates phone numbers and messages for security and correctness.
- **Separation of Concerns**: Clear separation between UI, business logic, and API calls.
- **Extensible**: Easily add new message types, logging, or business logic.
- **Clean Error Handling**: User-friendly status messages and robust backend error checks.

---

## Directory Structure

```
.
├── config.php
├── index.php
├── sendMessage.php
├── trigger.php
└── README.md
```

---

## Setup

1. **Clone this repository:**

   ```sh
   git clone https://github.com/patelbhavika46/whatsapp-message-api.git
   cd whatsapp-message-api
   ```

2. **Install PHP (if not already installed):**

   Requires PHP 7.4+.

3. **Configure WhatsApp API Credentials:**

   - Copy `config.sample.php` to `config.php`.
   - Fill in your `PHONE_NUMBER_ID` and `WHATSAPP_TOKEN` as provided by Meta for Developers.

   ```php
   <?php
   define('PHONE_NUMBER_ID', 'your_phone_number_id');
   define('WHATSAPP_TOKEN', 'your_whatsapp_api_token');
   ?>
   ```

4. **Run the App:**

   - Deploy on any standard PHP server (Apache, Nginx, XAMPP, etc.).
   - Or use PHP’s built-in server:

   ```sh
   php -S localhost:8000
   ```

   - Open [http://localhost:8000/index.php](http://localhost:8000/index.php) in your browser.

---

## Usage

1. Enter the recipient’s phone number in international format (e.g., `15551234567`).
2. Optionally enter a name.
3. Enter your message.
4. Click **Send Message**.

You’ll receive real-time feedback about the status of your message.

---

## Unit Testing

- The structure of `sendMessage.php` is designed for easy unit testing.
- Mock `sendWhatsAppMessage()` for tests, or use a dependency injection approach.
- You can add a `tests/` directory and use PHPUnit for automated tests.

---

## Extending

- **Add new message types:**  
  Refactor or extend `sendWhatsAppMessage()` to send images, templates, etc., as per Meta’s API documentation.
- **Integrate logging or analytics:**  
  Add hooks in `trigger.php` or `sendMessage.php`.
- **Connect to databases:**  
  Fetch dynamic message content or user lists from your own data sources.

---

## Security Considerations

- Always protect your API token and never expose `config.php` publicly.
- Implement further input validation and rate-limiting in production.
- Use HTTPS to protect credentials and user data in transit.

---

## Documentation

- All source files are self-documented with PHPDoc comments.
- See [Meta WhatsApp Business API Docs](https://developers.facebook.com/docs/whatsapp/cloud-api) for more on API options.

---

## License

This project is licensed under the MIT License.

---

## Author

- [patelbhavika46](https://github.com/patelbhavika46)
