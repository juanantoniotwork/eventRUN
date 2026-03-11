<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Ticket Recibido</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">
        <h2 style="color: #2563eb;">Notificación de Nuevo Ticket</h2>
        <p>Se ha registrado un nuevo ticket de soporte en la plataforma.</p>
        
        <div style="background-color: #f8fafc; padding: 15px; border-radius: 6px; margin-top: 20px;">
            <p><strong>Remitente:</strong> {{ $ticket->nombre }} ({{ $ticket->email }})</p>
            <p><strong>ID Ticket:</strong> #{{ $ticket->id }}</p>
            <p><strong>Asunto:</strong> {{ $ticket->asunto }}</p>
            <p><strong>Mensaje:</strong></p>
            <p style="white-space: pre-wrap;">{{ $ticket->mensaje }}</p>
        </div>

        <p style="margin-top: 20px; text-align: center;">
            <a href="{{ str_replace(':8000', ':8080', url('/admin/tickets/' . $ticket->id)) }}" style="background-color: #2563eb; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Gestionar Ticket</a>
        </p>
    </div>
</body>
</html>
