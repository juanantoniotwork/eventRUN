<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reglamento Oficial - {{ $evento->nombre }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #1e293b; line-height: 1.6; padding: 20px; }
        .header { border-bottom: 2px solid #2563eb; padding-bottom: 10px; margin-bottom: 30px; }
        .title { font-size: 24px; font-weight: bold; color: #0f172a; margin-bottom: 5px; }
        .subtitle { font-size: 14px; color: #64748b; }
        .content { white-space: pre-wrap; font-size: 13px; text-align: justify; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 10px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 5px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">REGLAMENTO OFICIAL</div>
        <div class="subtitle">{{ $evento->nombre }} - Edición 2026</div>
    </div>

    <div class="content">
        {{ $evento->reglamento }}
    </div>

    <div class="footer">
        &copy; 2026 EventRUN! Platform - Documento generado automáticamente.
    </div>
</body>
</html>
