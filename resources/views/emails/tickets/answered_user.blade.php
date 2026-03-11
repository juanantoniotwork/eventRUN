<!DOCTYPE html>
<html>
<head>
    <title>Respuesta a tu Ticket</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">
        <h2 style="color: #2563eb;">Hola, {{ $ticket->nombre }}</h2>
        <p>Tu consulta sobre <strong>"{{ $ticket->asunto }}"</strong> ha sido respondida por nuestro equipo.</p>
        
        <div style="background-color: #f0fdf4; padding: 15px; border: 1px solid #bbf7d0; border-radius: 6px; margin-top: 20px;">
            <p><strong>Nuestra Respuesta:</strong></p>
            <p style="white-space: pre-wrap;">{{ $ticket->respuesta }}</p>
        </div>

        <div style="background-color: #f8fafc; padding: 15px; border-radius: 6px; margin-top: 20px; font-size: 0.9em;">
            <p><strong>Tu consulta original:</strong></p>
            <p style="white-space: pre-wrap;">{{ $ticket->mensaje }}</p>
        </div>

        <p style="margin-top: 20px;">Si tienes más dudas, puedes volver a contactarnos.</p>
        <p>Atentamente,<br><strong>Equipo de EventRUN!</strong></p>
    </div>
</body>
</html>
