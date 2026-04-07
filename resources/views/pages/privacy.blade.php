@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6">
    <div class="mb-10">
        <p class="text-xs font-bold text-blue-600 dark:text-blue-400 uppercase tracking-widest mb-2">Legal</p>
        <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-4">Política de Privacidad</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Última actualización: 1 de enero de 2026</p>
    </div>

    <div class="space-y-8 text-sm leading-relaxed text-slate-600 dark:text-slate-300">

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">1. Responsable del tratamiento</h2>
            <p>EventRUN! es la entidad responsable del tratamiento de los datos personales recogidos a través de esta plataforma, de conformidad con el Reglamento General de Protección de Datos (RGPD) y la Ley Orgánica de Protección de Datos (LOPDGDD).</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">2. Datos que recopilamos</h2>
            <p>Recopilamos los siguientes tipos de información:</p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li><strong class="text-slate-700 dark:text-slate-200">Datos de cuenta:</strong> nombre, dirección de correo electrónico y contraseña.</li>
                <li><strong class="text-slate-700 dark:text-slate-200">Datos de uso:</strong> registros de acceso, páginas visitadas y acciones realizadas en la plataforma.</li>
                <li><strong class="text-slate-700 dark:text-slate-200">Datos de soporte:</strong> información proporcionada en tickets de soporte técnico, incluyendo archivos adjuntos.</li>
                <li><strong class="text-slate-700 dark:text-slate-200">Datos de idioma:</strong> preferencia de idioma almacenada localmente en tu dispositivo.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">3. Finalidad del tratamiento</h2>
            <p>Utilizamos tus datos para:</p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li>Gestionar tu cuenta y proporcionar acceso al servicio.</li>
                <li>Atender solicitudes de soporte técnico.</li>
                <li>Enviar notificaciones relacionadas con tu actividad en la plataforma.</li>
                <li>Mejorar la experiencia de usuario y el funcionamiento del servicio.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">4. Base legal del tratamiento</h2>
            <p>El tratamiento de tus datos se basa en la ejecución del contrato de servicio aceptado al registrarte, el cumplimiento de obligaciones legales y, en su caso, tu consentimiento explícito.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">5. Conservación de datos</h2>
            <p>Conservamos tus datos personales mientras tu cuenta esté activa o sea necesario para prestarte el servicio. Una vez eliminada tu cuenta, los datos se suprimirán en un plazo máximo de 30 días, salvo obligación legal de conservación.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">6. Tus derechos</h2>
            <p>Tienes derecho a acceder, rectificar, suprimir, limitar el tratamiento, oponerte al tratamiento y solicitar la portabilidad de tus datos. Puedes ejercer estos derechos contactando con nosotros a través del <a href="{{ route('help-center') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Centro de Ayuda</a>.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">7. Cookies</h2>
            <p>Utilizamos únicamente cookies técnicas necesarias para el funcionamiento de la plataforma (gestión de sesión e idioma). No utilizamos cookies de seguimiento ni publicidad.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">8. Cambios en esta política</h2>
            <p>Podemos actualizar esta Política de Privacidad ocasionalmente. Te notificaremos cualquier cambio significativo publicando la nueva política en esta página con la fecha de actualización.</p>
        </section>

    </div>
</div>
@endsection
