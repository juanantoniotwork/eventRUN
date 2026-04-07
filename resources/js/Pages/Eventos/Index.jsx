import React, { useState, useEffect } from 'react';
import { Head } from '@inertiajs/react';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { CalendarDays, MapPin, ArrowRight } from "lucide-react";
import LanguageSelector from '@/components/LanguageSelector';
import DarkModeToggle from '@/components/DarkModeToggle';
import Footer from '@/components/Footer';
import useDarkMode from '@/lib/useDarkMode';
import { translations } from '@/lib/translations';
import AdminBar from '@/components/AdminBar';

export default function Index({ eventos }) {
    const [lang, setLang] = useState(localStorage.getItem('lang') || 'es');
    const [dark, setDark] = useDarkMode();
    const t = translations[lang];

    useEffect(() => {
        localStorage.setItem('lang', lang);
    }, [lang]);

    const getEventTitle = (evento) => {
        if (lang === 'en' && evento.nombre_en) return evento.nombre_en;
        return evento.nombre;
    };

    const getEventDesc = (evento) => {
        if (lang === 'en' && evento.descripcion_en) return evento.descripcion_en;
        return evento.descripcion;
    };

    return (
        <div className="min-h-screen bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
            <Head title={t.hero_title} />

            <header className="bg-white dark:bg-slate-800 border-b dark:border-slate-700 sticky top-0 z-10 transition-colors duration-300">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                    <h1 className="text-2xl font-bold text-blue-600 dark:text-blue-400 tracking-tight">{t.title}</h1>
                    <div className="flex items-center gap-2">
                        <DarkModeToggle dark={dark} onToggle={() => setDark(!dark)} />
                        <LanguageSelector currentLang={lang} onChange={setLang} />
                    </div>
                </div>
            </header>

            <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div className="text-center mb-16">
                    <h2 className="text-4xl font-extrabold text-slate-900 dark:text-white sm:text-5xl mb-4 tracking-tight">
                        {t.hero_title}
                    </h2>
                    <p className="text-xl text-slate-500 dark:text-slate-400 font-light max-w-2xl mx-auto">
                        {t.hero_subtitle}
                    </p>
                </div>

                {eventos.data.length > 0 ? (
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {eventos.data.map((evento) => (
                            <Card key={evento.id} className="overflow-hidden border-none shadow-md hover:shadow-xl transition-all duration-300 group bg-white dark:bg-slate-800">
                                <div className="relative h-48 overflow-hidden">
                                    <img
                                        src={evento.imagen || '/placeholder-event.jpg'}
                                        alt={getEventTitle(evento)}
                                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    />
                                </div>
                                <CardHeader className="pb-2">
                                    <div className="flex items-center gap-1.5 mb-1">
                                        <span className="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">ID</span>
                                        <span className="text-[10px] font-mono font-bold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 border border-blue-100 dark:border-blue-800 px-2 py-0.5 rounded tracking-wider">
                                            {evento.codigo}
                                        </span>
                                    </div>
                                    <CardTitle className="text-xl font-bold text-slate-800 dark:text-white line-clamp-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                        {getEventTitle(evento)}
                                    </CardTitle>
                                    <CardDescription className="flex items-center gap-2 text-slate-500 dark:text-slate-400 font-medium">
                                        <CalendarDays className="w-4 h-4 text-blue-500" />
                                        {new Date(evento.fecha).toLocaleDateString(lang === 'es' ? 'es-ES' : 'en-GB', {
                                            day: 'numeric', month: 'long', year: 'numeric'
                                        })}
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    <div className="flex items-start gap-2 text-sm text-slate-600 dark:text-slate-400 mb-4 line-clamp-2 min-h-[2.5rem]">
                                        <MapPin className="w-4 h-4 text-slate-400 mt-0.5 shrink-0" />
                                        <span>{evento.ubicacion || 'Ubicación por confirmar'}</span>
                                    </div>
                                    <p className="text-sm text-slate-500 dark:text-slate-400 line-clamp-3 leading-relaxed">
                                        {getEventDesc(evento)}
                                    </p>
                                </CardContent>
                                <CardFooter className="pt-4 border-t border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-700/30">
                                    <a
                                        href={`/eventos/${evento.id}?lang=${lang}`}
                                        className="w-full inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors bg-slate-900 dark:bg-slate-600 text-white hover:bg-blue-600 dark:hover:bg-blue-600 h-10 px-4 py-2 group/btn"
                                    >
                                        {t.view_details}
                                        <ArrowRight className="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" />
                                    </a>
                                </CardFooter>
                            </Card>
                        ))}
                    </div>
                ) : (
                    <div className="text-center py-20 bg-white dark:bg-slate-800 rounded-3xl border-2 border-dashed border-slate-200 dark:border-slate-700">
                        <p className="text-slate-400 dark:text-slate-500 text-lg font-medium">{t.no_events}</p>
                    </div>
                )}
            </main>

            <Footer t={t} />
            <AdminBar />
        </div>
    );
}
