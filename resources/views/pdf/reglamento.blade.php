<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="utf-8">
    <style>
        @page { margin: 80px 50px; }
        body { 
            font-family: 'Helvetica', sans-serif; 
            color: #334155; 
            line-height: 1.5; 
            font-size: 14px; 
            text-align: left;
        }
        .header { position: fixed; top: -50px; left: 0px; right: 0px; height: 30px; border-bottom: 2px solid #2563eb; }
        .footer { position: fixed; bottom: -40px; left: 0px; right: 0px; height: 20px; text-align: center; font-size: 10px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 5px; }
        .title { font-size: 24px; font-weight: bold; color: #1e293b; margin-top: 20px; }
        .section-title { font-size: 16px; font-weight: bold; color: #2563eb; border-bottom: 1px solid #e2e8f0; padding-bottom: 5px; margin-top: 30px; margin-bottom: 15px; text-transform: uppercase; }
        .content { white-space: pre-wrap; color: #475569; }
        .label { font-weight: bold; color: #64748b; }
    </style>
</head>
<body>
    @php
        $nombre = ($lang === 'en' && !empty($evento->nombre_en)) ? $evento->nombre_en : $evento->nombre;
        $desc = ($lang === 'en' && !empty($evento->descripcion_en)) ? $evento->descripcion_en : $evento->descripcion;
        $reglamento = ($lang === 'en' && !empty($evento->reglamento_en)) ? $evento->reglamento_en : $evento->reglamento;
        
        $t = [
            'es' => ['info' => 'Información del Evento', 'desc' => 'Descripción', 'rules' => 'Reglamento Oficial', 'date' => 'Fecha:', 'loc' => 'Ubicación:'],
            'en' => ['info' => 'Event Information', 'desc' => 'Description', 'rules' => 'Official Rules', 'date' => 'Date:', 'loc' => 'Location:']
        ][$lang];
    @endphp

    <div class="header">
        <span style="font-weight: bold; color: #2563eb;">EventRUN! Platform</span>
    </div>

    <div class="footer">
        {{ $nombre }} - {{ now()->format('d/m/Y') }}
    </div>

    <div class="title">{{ $nombre }}</div>
    
    <div class="section-title">{{ $t['info'] }}</div>
    <p><span class="label">{{ $t['date'] }}</span> {{ $evento->fecha->format('d/m/Y H:i') }}</p>
    <p><span class="label">{{ $t['loc'] }}</span> {{ $evento->ubicacion ?? 'N/A' }}</p>

    <div class="section-title">{{ $t['desc'] }}</div>
    <div class="content">{{ $desc }}</div>

    <div class="section-title">{{ $t['rules'] }}</div>
    <div class="content">{{ $reglamento }}</div>

</body>
</html>
