import React from 'react';
import { usePage } from '@inertiajs/react';

export default function AdminBar() {
    const { auth } = usePage().props;

    if (!auth?.user || !['administrador', 'gestor'].includes(auth.user.rol)) {
        return null;
    }

    const panelUrl = auth.user.rol === 'administrador' ? '/admin/usuarios' : '/gestor/eventos';

    return (
        <div className="fixed bottom-6 right-6 z-50">
            <a
                href={panelUrl}
                className="flex items-center gap-2 bg-slate-900 dark:bg-slate-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-lg hover:bg-slate-700 dark:hover:bg-slate-600 transition-colors"
            >
                <svg className="w-4 h-4" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Volver al panel
            </a>
        </div>
    );
}
