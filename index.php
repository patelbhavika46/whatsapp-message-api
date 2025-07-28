<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatsApp API Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add CSS for better readability if needed -->
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        form { max-width: 400px; }
        input, button { width: 100%; margin: 8px 0; padding: 0.5rem; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
<h2>Send WhatsApp Message</h2>
<?php if (isset($_GET['status'])): ?>
    <div class="<?= htmlspecialchars($_GET['status']) ?>">
        <?= htmlspecialchars($_GET['msg']) ?>
    </div>
<?php endif; ?>
<form method="POST" action="trigger.php">
    <input type="text" name="phone" pattern="\d{10,15}" title="Enter a valid phone number, e.g., 15551234567" placeholder="Enter Phone (e.g., 15551234567)" required>
    <input type="text" name="name" placeholder="Enter Name (optional)">
    <input type="text" name="message" placeholder="Enter Message" required>
    <button type="submit">Send Message</button>
</form>
</body>
</html>