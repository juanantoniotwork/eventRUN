@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6">
    <div class="mb-10">
        <p class="text-xs font-bold text-blue-600 dark:text-blue-400 uppercase tracking-widest mb-2">Legal</p>
        <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-4">Términos de Servicio</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Última actualización: 1 de enero de 2026</p>
    </div>

    <div class="space-y-8 text-sm leading-relaxed text-slate-600 dark:text-slate-300">

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">1. Aceptación de los términos</h2>
            <p>Al acceder y utilizar la plataforma EventRUN!, aceptas quedar vinculado por estos Términos de Servicio. Si no estás de acuerdo con alguna parte de estos términos, no podrás acceder al servicio.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">2. Descripción del servicio</h2>
            <p>EventRUN! es una plataforma de gestión y participación en eventos deportivos de running y carreras populares. Permite a organizadores publicar eventos y a los participantes consultar información, reglamentos y contactar con el soporte técnico.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">3. Cuentas de usuario</h2>
            <p>El acceso a determinadas funcionalidades requiere una cuenta de usuario. Eres responsable de mantener la confidencialidad de tus credenciales de acceso y de todas las actividades que ocurran bajo tu cuenta. Debes notificarnos inmediatamente cualquier uso no autorizado de tu cuenta.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">4. Uso aceptable</h2>
            <p>Te comprometes a utilizar el servicio únicamente para fines lícitos y de manera que no infrinja los derechos de terceros. Está prohibido:</p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li>Publicar contenido falso, engañoso o fraudulento.</li>
                <li>Intentar acceder sin autorización a sistemas o datos de la plataforma.</li>
                <li>Interferir con el funcionamiento normal del servicio.</li>
                <li>Usar el servicio para enviar comunicaciones no solicitadas.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">5. Propiedad intelectual</h2>
            <p>Todo el contenido de EventRUN! —incluyendo textos, gráficos, logotipos, iconos y software— es propiedad de EventRUN! o de sus proveedores de contenido y está protegido por las leyes de propiedad intelectual aplicables.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">6. Limitación de responsabilidad</h2>
            <p>EventRUN! no será responsable de daños directos, indirectos, incidentales o consecuentes derivados del uso o la imposibilidad de usar el servicio. La plataforma se proporciona "tal cual" sin garantías de ningún tipo.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">7. Modificaciones</h2>
            <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Los cambios entrarán en vigor en el momento de su publicación. El uso continuado del servicio tras la publicación de cambios constituye tu aceptación de los nuevos términos.</p>
        </section>

        <section>
            <h2 class="text-lg font-bold text-slate-800 dark:text-white mb-3">8. Contacto</h2>
            <p>Si tienes preguntas sobre estos Términos de Servicio, puedes contactarnos a través del <a href="{{ route('help-center') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Centro de Ayuda</a>.</p>
        </section>

    </div>
</div>
@endsection
