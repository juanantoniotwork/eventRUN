<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>{{ __('messages.pdf_title') }} - {{ (App::getLocale() === 'en' && $evento->nombre_en) ? $evento->nombre_en : $evento->nombre }}</title>
    <style>
        @page { margin: 100px 50px; }
        body { font-family: 'Helvetica', sans-serif; color: #334155; line-height: 1.5; font-size: 12px; }
        .header { position: fixed; top: -70px; left: 0px; right: 0px; height: 50px; border-bottom: 2px solid #2563eb; }
        .footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 30px; text-align: center; font-size: 9px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 5px; }
        .title { font-size: 20px; font-bold; color: #1e293b; margin-top: 10px; }
        .section-title { font-size: 14px; font-weight: bold; color: #2563eb; border-bottom: 1px solid #e2e8f0; padding-bottom: 5px; margin-top: 25px; margin-bottom: 10px; text-transform: uppercase; }
        .info-grid { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        .info-label { font-weight: bold; color: #64748b; width: 30%; padding: 5px 0; border-bottom: 1px solid #f1f5f9; }
        .info-value { color: #1e293b; padding: 5px 0; border-bottom: 1px solid #f1f5f9; }
        .content { text-align: justify; white-space: pre-wrap; color: #475569; }
        .badge { display: inline-block; padding: 3px 8px; background: #eff6ff; color: #2563eb; border-radius: 4px; font-size: 10px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <table style="width: 100%;">
            <tr>
                <td style="font-size: 18px; font-weight: bold; color: #2563eb;">EventRUN!</td>
                <td style="text-align: right; font-size: 10px; color: #64748b;">{{ __('messages.pdf_edition') }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        {{ __('messages.pdf_generated') }} - {{ now()->format('d/m/Y H:i') }} - Page <script type="text/php">if (isset($pdf)) { $x = 520; $y = 780; $text = "{PAGE_NUM} / {PAGE_COUNT}"; $font = null; $size = 9; $color = array(0.6,0.6,0.6); $word_space = 0.0; $char_space = 0.0; $angle = 0.0; $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle); }</script>
    </div>

    <div class="title">{{ __('messages.pdf_title') }}</div>
    <div style="font-size: 16px; color: #64748b; margin-bottom: 20px;">
        {{ (App::getLocale() === 'en' && $evento->nombre_en) ? $evento->nombre_en : $evento->nombre }}
    </div>

    <div class="section-title">{{ __('messages.pdf_event_info') }}</div>
    <table class="info-grid">
        <tr>
            <td class="info-label">{{ __('messages.event_date') }}</td>
            <td class="info-value">{{ $evento->fecha->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td class="info-label">{{ __('messages.location') }}</td>
            <td class="info-value">{{ $evento->ubicacion ?? 'N/A' }}</td>
        </tr>
        @if($evento->latitud && $evento->longitud)
        <tr>
            <td class="info-label">GPS Coordinates</td>
            <td class="info-value">{{ $evento->latitud }}, {{ $evento->longitud }}</td>
        </tr>
        @endif
        <tr>
            <td class="info-label">Status</td>
            <td class="info-value"><span class="badge">{{ strtoupper($evento->estado) }}</span></td>
        </tr>
    </table>

    <div class="section-title">{{ __('messages.pdf_description') }}</div>
    <div class="content" style="margin-bottom: 20px;">
        {{ (App::getLocale() === 'en' && $evento->descripcion_en) ? $evento->descripcion_en : $evento->descripcion }}
    </div>

    <div class="section-title">{{ __('messages.pdf_rules') }}</div>
    <div class="content">
        {{ (App::getLocale() === 'en' && $evento->reglamento_en) ? $evento->reglamento_en : $evento->reglamento }}
    </div>
</body>
</html>
