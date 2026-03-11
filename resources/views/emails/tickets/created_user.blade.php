<!DOCTYPE html>
<html>
<head>
    <title>Ticket Recibido</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">
        <h2 style="color: #2563eb;">Hola, {{ $ticket->nombre }}</h2>
        <p>Hemos recibido tu consulta correctamente. Nuestro equipo la revisará lo antes posible.</p>
        
        <div style="background-color: #f8fafc; padding: 15px; border-radius: 6px; margin-top: 20px;">
            <p><strong>Detalles del Ticket:</strong></p>
            <p><strong>Evento:</strong> {{ $ticket->evento->nombre }}</p>
            <p><strong>Asunto:</strong> {{ $ticket->asunto }}</p>
            <p><strong>Mensaje:</strong></p>
            <p style="white-space: pre-wrap;">{{ $ticket->mensaje }}</p>
        </div>

        <div style="margin-top: 20px; padding: 10px; border-left: 4px solid #2563eb; background-color: #eff6ff; font-size: 0.9em;">
            <strong>📎 Adjunto disponible:</strong> Te hemos adjuntado un documento PDF con la ficha técnica y la información completa de la carrera para tu referencia.
        </div>

        <p style="margin-top: 20px;">Gracias por confiar en <strong>EventRUN!</strong>.</p>
    </div>
</body>
</html>
