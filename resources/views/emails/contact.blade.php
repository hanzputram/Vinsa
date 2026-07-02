<!DOCTYPE html>
<html>
<head>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" href="{{ asset('image/vinsalg.png') }}">
    <title>New Contact Message</title>
</head>
<body>
    <h2>New message from {{ $contactData['name'] }}</h2>
    <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
    <p><strong>Phone:</strong> {{ $contactData['phone'] ?? 'N/A' }}</p>
    <p><strong>Subject:</strong> {{ $contactData['subject'] ?? 'N/A' }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contactData['message'] }}</p>
</body>
</html>

