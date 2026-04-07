import React, { useState, useEffect } from 'react';
import { Head } from '@inertiajs/react';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { CalendarDays, MapPin, ArrowRight } from "lucide-react";
import LanguageSelector from '@/components/LanguageSelector';
import { translations } from '@/lib/translations';

export default function Index({ eventos }) {
    const [lang, setLang] = useState(localStorage.getItem('lang') || 'es');
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
        <div className="min-h-screen bg-slate-50">
            <Head title={t.hero_title} />
            
            <header className="bg-white border-b sticky top-0 z-10">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                    <h1 className="text-2xl font-bold text-blue-600 tracking-tight">{t.title}</h1>
                    <LanguageSelector currentLang={lang} onChange={setLang} />
                </div>
            </header>

            <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div className="text-center mb-16">
                    <h2 className="text-4xl font-extrabold text-slate-900 sm:text-5xl mb-4 tracking-tight">
                        {t.hero_title}
                    </h2>
                    <p className="text-xl text-slate-500 font-light max-w-2xl mx-auto">
                        {t.hero_subtitle}
                    </p>
                </div>

                {eventos.data.length > 0 ? (
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {eventos.data.map((evento) => (
                            <Card key={evento.id} className="overflow-hidden border-none shadow-md hover:shadow-xl transition-all duration-300 group bg-white">
                                <div className="relative h-48 overflow-hidden">
                                    <img 
                                        src={evento.imagen || '/placeholder-event.jpg'} 
                                        alt={getEventTitle(evento)}
                                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    />
                                </div>
                                <CardHeader className="pb-2">
                                    <CardTitle className="text-xl font-bold text-slate-800 line-clamp-1 group-hover:text-blue-600 transition-colors">
                                        {getEventTitle(evento)}
                                    </CardTitle>
                                    <CardDescription className="flex items-center gap-2 text-slate-500 font-medium">
                                        <CalendarDays className="w-4 h-4 text-blue-500" />
                                        {new Date(evento.fecha).toLocaleDateString(lang === 'es' ? 'es-ES' : 'en-GB', { 
                                            day: 'numeric', month: 'long', year: 'numeric' 
                                        })}
                                    </CardDescription>
                                </CardHeader>
                                <CardContent>
                                    <div className="flex items-start gap-2 text-sm text-slate-600 mb-4 line-clamp-2 min-h-[2.5rem]">
                                        <MapPin className="w-4 h-4 text-slate-400 mt-0.5 shrink-0" />
                                        <span>{evento.ubicacion || 'Ubicación por confirmar'}</span>
                                    </div>
                                    <p className="text-sm text-slate-500 line-clamp-3 leading-relaxed">
                                        {getEventDesc(evento)}
                                    </p>
                                </CardContent>
                                <CardFooter className="pt-4 border-t bg-slate-50/50">
                                    <a 
                                        href={`/eventos/${evento.id}?lang=${lang}`} 
                                        className="w-full inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-slate-900 text-white hover:bg-blue-600 h-10 px-4 py-2 group/btn"
                                    >
                                        {t.view_details}
                                        <ArrowRight className="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" />
                                    </a>
                                </CardFooter>
                            </Card>
                        ))}
                    </div>
                ) : (
                    <div className="text-center py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200">
                        <p className="text-slate-400 text-lg font-medium">{t.no_events}</p>
                    </div>
                )}
            </main>

            <footer className="bg-white border-t py-12 mt-20">
                <div className="max-w-7xl mx-auto px-4 text-center">
                    <p className="text-slate-500 text-sm font-medium">
                        {t.footer_copy}
                    </p>
                </div>
            </footer>
        </div>
    );
}
