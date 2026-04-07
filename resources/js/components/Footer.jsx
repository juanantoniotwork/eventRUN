import React from 'react';

export default function Footer({ t }) {
    return (
        <footer className="bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 border-t border-blue-100 dark:border-slate-700 pt-16 pb-8 mt-20">
            <div className="max-w-7xl mx-auto px-6">
                <div className="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    {/* Branding */}
                    <div className="col-span-1">
                        <div className="flex items-center gap-2 mb-6">
                            <div className="bg-blue-600 p-1.5 rounded-lg text-white">
                                <svg className="w-5 h-5" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24" strokeLinecap="round" strokeLinejoin="round">
                                    <path d="M13 4v4l3 2m-5 10v-4l-3-2M9 4a1 1 0 112 0 1 1 0 01-2 0zM4 18h2m4-14h2M18 10h2M12 14l-4 4m8-4l4 4"/>
                                </svg>
                            </div>
                            <span className="text-xl font-bold tracking-tight text-slate-900 dark:text-white">EventRUN!</span>
                        </div>
                        <p className="text-sm leading-relaxed text-slate-500 dark:text-slate-400">
                            {t.footer_desc || 'La plataforma líder en gestión de eventos deportivos.'}
                        </p>
                    </div>

                    {/* Plataforma */}
                    <div>
                        <h4 className="text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest mb-6">
                            {t.footer_platform || 'Plataforma'}
                        </h4>
                        <ul className="space-y-4 text-sm font-medium text-slate-500 dark:text-slate-400">
                            <li><a href="/" className="hover:text-blue-500 transition-colors">{t.footer_races || 'Carreras activas'}</a></li>
                            <li><a href="/como-funciona" className="hover:text-blue-500 transition-colors">{t.footer_how || 'Cómo funciona'}</a></li>
                        </ul>
                    </div>

                    {/* Recursos */}
                    <div>
                        <h4 className="text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest mb-6">
                            {t.footer_resources || 'Recursos'}
                        </h4>
                        <ul className="space-y-4 text-sm font-medium text-slate-500 dark:text-slate-400">
                            <li><a href="/como-funciona" className="hover:text-blue-500 transition-colors text-blue-600 dark:text-blue-400">{t.footer_learning || 'Centro de Aprendizaje'}</a></li>
                            <li><a href="/centro-ayuda" className="hover:text-blue-500 transition-colors">{t.footer_docs || 'Documentación de usuario'}</a></li>
                        </ul>
                    </div>

                    {/* Soporte */}
                    <div>
                        <h4 className="text-slate-900 dark:text-white font-bold text-xs uppercase tracking-widest mb-6">
                            {t.footer_support || 'Soporte Global'}
                        </h4>
                        <div className="bg-blue-50 dark:bg-slate-700/50 rounded-xl p-4 border border-blue-100 dark:border-slate-600">
                            <div className="flex items-center gap-3 mb-2">
                                <span className="relative flex h-2 w-2">
                                    <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span className="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                </span>
                                <span className="text-xs font-bold text-blue-900 dark:text-blue-300 uppercase tracking-tighter">
                                    {t.footer_status || 'Sistemas Operativos'}
                                </span>
                            </div>
                            <p className="text-[11px] text-blue-700 dark:text-blue-400 leading-tight">
                                {t.footer_status_desc || 'Todos los servicios funcionando con normalidad'}
                            </p>
                        </div>
                    </div>
                </div>

                {/* Bottom bar */}
                <div className="border-t border-slate-200 dark:border-slate-700 pt-8 flex flex-col md:flex-row justify-between items-center text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                    <p>{t.footer_copy}</p>
                    <div className="mt-4 md:mt-0 flex space-x-6">
                        <a href="/terminos-de-servicio" className="hover:text-blue-500 transition-colors">
                            {t.footer_terms || 'Términos de servicio'}
                        </a>
                        <a href="/politica-de-privacidad" className="hover:text-blue-500 transition-colors">
                            {t.footer_privacy || 'Política de privacidad'}
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    );
}
