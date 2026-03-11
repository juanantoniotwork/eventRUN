<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha Técnica Oficial - EventRUN!</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #1e293b; line-height: 1.5; margin: 0; padding: 0; }
        .container { padding: 30px; }
        .header { border-bottom: 3px solid #2563eb; padding-bottom: 15px; margin-bottom: 25px; }
        .project-name { font-size: 28px; font-weight: bold; color: #2563eb; letter-spacing: -1px; }
        .status-badge { float: right; background-color: #dcfce7; color: #166534; padding: 5px 12px; border-radius: 15px; font-size: 10px; font-bold: true; margin-top: 10px; text-transform: uppercase; }
        
        .main-title { font-size: 22px; font-weight: bold; color: #0f172a; margin-bottom: 5px; text-transform: uppercase; }
        .subtitle { font-size: 12px; color: #64748b; margin-bottom: 25px; border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; }

        .grid { width: 100%; margin-bottom: 30px; }
        .col { width: 50%; vertical-align: top; }
        
        .section-title { background-color: #f1f5f9; padding: 8px 15px; font-size: 13px; font-weight: bold; color: #334155; border-left: 4px solid #2563eb; margin-bottom: 15px; margin-top: 20px; }
        
        .info-group { margin-bottom: 15px; padding: 0 15px; }
        .label { font-size: 10px; font-weight: bold; color: #94a3b8; text-transform: uppercase; margin-bottom: 3px; }
        .value { font-size: 14px; color: #334155; font-weight: 500; }

        .description-box { background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 20px; border-radius: 8px; font-size: 13px; color: #475569; text-align: justify; margin-top: 10px; }
        
        .tech-specs { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .tech-specs td { padding: 10px; border-bottom: 1px solid #f1f5f9; font-size: 12px; }
        .tech-specs .spec-label { font-weight: bold; color: #64748b; width: 40%; }

        .footer { position: fixed; bottom: 30px; left: 30px; right: 30px; text-align: center; font-size: 9px; color: #94a3b8; border-top: 1px solid #e2e8f0; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="status-badge">Inscripciones Abiertas</span>
            <span class="project-name">EventRUN!</span>
        </div>

        <div class="main-title">{{ $evento->nombre }}</div>
        <div class="subtitle">Documento de Información Técnica para Atletas y Colaboradores</div>

        <table class="grid">
            <tr>
                <td class="col">
                    <div class="section-title">DETALLES DE LA CONVOCATORIA</div>
                    <div class="info-group">
                        <div class="label">Fecha de Inicio</div>
                        <div class="value">{{ $evento->fecha->format('d/m/Y') }} - 08:30 AM</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Fecha de Finalización (Cierre)</div>
                        <div class="value">{{ $evento->fecha->format('d/m/Y') }} - 15:30 PM</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Tiempo Límite de Carrera</div>
                        <div class="value">06 horas 30 minutos</div>
                    </div>
                </td>
                <td class="col">
                    <div class="section-title">ESPECIFICACIONES TÉCNICAS</div>
                    <table class="tech-specs">
                        <tr>
                            <td class="spec-label">Distancia Oficial</td>
                            <td>42.195 KM (Homologada)</td>
                        </tr>
                        <tr>
                            <td class="spec-label">Tipo de Superficie</td>
                            <td>Asfalto / Urbano</td>
                        </tr>
                        <tr>
                            <td class="spec-label">Desnivel Acumulado</td>
                            <td>+145 metros</td>
                        </tr>
                        <tr>
                            <td class="spec-label">Avituallamientos</td>
                            <td>Cada 5 KM / Agua e Isotónicos</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="section-title">RESUMEN EJECUTIVO Y LOGÍSTICA</div>
        <div class="description-box">
            {{ $evento->descripcion }}
            <br><br>
            <strong>Logística de Salida:</strong> El acceso al cajón de salida se realizará de forma escalonada según el tiempo previsto de carrera. Los atletas deben presentarse en la zona de control al menos 60 minutos antes del pistoletazo oficial. Es obligatorio el uso del dorsal con chip integrado de forma visible en el pecho.
            <br><br>
            <strong>Servicios al Corredor:</strong> La organización pone a disposición de los participantes servicio de guardarropa, duchas en meta, asistencia médica móvil durante todo el recorrido y medalla de "Finisher" para todos aquellos que completen la distancia dentro del tiempo oficial de corte.
        </div>

        <div class="section-title">CRONOGRAMA ESTIMADO DEL DÍA</div>
        <table class="tech-specs" style="margin-bottom: 40px;">
            <tr>
                <td style="width: 20%; font-weight: bold;">07:00 AM</td>
                <td>Apertura de zona de Guardarropa y Área Técnica</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">08:15 AM</td>
                <td>Cierre de Cajones de Salida</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">08:30 AM</td>
                <td>Salida Oficial (Elite y General)</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">11:45 AM</td>
                <td>Llegada estimada del primer corredor</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">15:00 PM</td>
                <td>Ceremonia de Entrega de Premios</td>
            </tr>
        </table>

        <div class="footer">
            Este documento es generado automáticamente por la plataforma <strong>EventRUN! Tech Stack</strong> v1.2.4.<br>
            La información contenida está sujeta a cambios por motivos de seguridad o climatología. Consúltela regularmente.
        </div>
    </div>
</body>
</html>
