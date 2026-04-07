import React, { useState, useEffect } from 'react';
import { Head, Link } from '@inertiajs/react';
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Card, CardHeader, CardTitle, CardContent, CardFooter } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Label } from "@/components/ui/label";
import { CalendarDays, MapPin, ArrowLeft, Download, Send, CheckCircle, AlertCircle } from "lucide-react";
import LanguageSelector from '@/components/LanguageSelector';
import DarkModeToggle from '@/components/DarkModeToggle';
import Footer from '@/components/Footer';
import AdminBar from '@/components/AdminBar';
import useDarkMode from '@/lib/useDarkMode';
import { translations } from '@/lib/translations';

export default function Show({ evento }) {
    const urlParams = new URLSearchParams(window.location.search);
    const [lang, setLang] = useState(urlParams.get('lang') || localStorage.getItem('lang') || 'es');
    const [dark, setDark] = useDarkMode();
    const t = translations[lang];
    const data = evento.data || evento;

    useEffect(() => {
        localStorage.setItem('lang', lang);
        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lang=' + lang;
        window.history.pushState({path: newUrl}, '', newUrl);
    }, [lang]);

    const getVal = (field) => {
        if (lang === 'en' && data[field + '_en']) return data[field + '_en'];
        return data[field];
    };

    const [formData, setFormData] = useState({ nombre: '', email: '', asunto: '', mensaje: '' });
    const [status, setStatus] = useState({ type: null, message: '' });
    const [isSubmitting, setIsSubmitting] = useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setIsSubmitting(true);
        setStatus({ type: null, message: '' });
        try {
            const response = await fetch(`/api/public/eventos/${data.id}/tickets`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(formData)
            });
            const result = await response.json();
            if (response.ok) {
                setStatus({ type: 'success', message: t.form_success });
                setFormData({ nombre: '', email: '', asunto: '', mensaje: '' });
            } else {
                setStatus({ type: 'error', message: result.message || 'Error' });
            }
        } catch {
            setStatus({ type: 'error', message: 'Error' });
        } finally {
            setIsSubmitting(false);
        }
    };

    return (
        <div className="min-h-screen bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
            <Head title={`${getVal('nombre')} - EventRUN!`} />

            <header className="bg-white/80 dark:bg-slate-800/80 backdrop-blur-md border-b dark:border-slate-700 sticky top-0 z-30 transition-colors duration-300">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                    <div className="flex items-center gap-4">
                        <Link href="/" className="inline-flex items-center justify-center rounded-full w-10 h-10 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all">
                            <ArrowLeft className="w-5 h-5 text-slate-600 dark:text-slate-300" />
                        </Link>
                        <h1 className="text-xl font-bold text-slate-900 dark:text-white tracking-tight line-clamp-1">{getVal('nombre')}</h1>
                    </div>
                    <div className="flex items-center gap-2">
                        <DarkModeToggle dark={dark} onToggle={() => setDark(!dark)} />
                        <LanguageSelector currentLang={lang} onChange={setLang} />
                    </div>
                </div>
            </header>

            <main>
                {/* Hero */}
                <div className="relative w-full h-[50vh] min-h-[400px] overflow-hidden">
                    <img
                        src={data.imagen || '/placeholder-event.jpg'}
                        alt={getVal('nombre')}
                        className="w-full h-full object-cover"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                    <div className="absolute bottom-0 left-0 w-full p-8 md:p-16">
                        <div className="max-w-7xl mx-auto">
                            <div className="flex items-center gap-3 mb-4">
                                <Badge className="bg-blue-600 border-none px-4 py-1 text-xs font-black uppercase tracking-widest shadow-lg text-white">
                                    {data.estado?.toUpperCase()}
                                </Badge>
                            </div>
                            <h2 className="text-4xl md:text-7xl font-black text-white mb-4 leading-tight">
                                {getVal('nombre')}
                            </h2>
                            <div className="flex flex-wrap gap-6 text-white/90 font-bold">
                                <div className="flex items-center gap-2">
                                    <CalendarDays className="w-5 h-5 text-blue-400" />
                                    <span>
                                        {new Date(data.fecha).toLocaleDateString(lang === 'es' ? 'es-ES' : 'en-GB', {
                                            day: 'numeric', month: 'long', year: 'numeric'
                                        })} • {new Date(data.fecha).toLocaleTimeString(lang === 'es' ? 'es-ES' : 'en-GB', {
                                            hour: '2-digit', minute: '2-digit'
                                        })} HS
                                    </span>
                                </div>
                                <div className="flex items-center gap-2">
                                    <MapPin className="w-5 h-5 text-blue-400" />
                                    <span>{data.ubicacion || '...'}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div className="grid grid-cols-1 lg:grid-cols-12 gap-12">

                        {/* Contenido principal */}
                        <div className="lg:col-span-8 space-y-12">
                            <section className="bg-white dark:bg-slate-800 rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100 dark:border-slate-700">
                                <div className="flex items-center gap-3 mb-8">
                                    <div className="w-2 h-8 bg-blue-600 rounded-full"></div>
                                    <h3 className="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">
                                        {t.details_title}
                                    </h3>
                                </div>
                                <p className="text-slate-600 dark:text-slate-300 leading-relaxed whitespace-pre-wrap font-medium">
                                    {getVal('descripcion')}
                                </p>
                            </section>

                            {(data.reglamento || data.reglamento_en) && (
                                <section className="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 md:p-12 text-white shadow-2xl overflow-hidden relative">
                                    <div className="relative z-10">
                                        <h3 className="text-3xl font-black mb-4 tracking-tighter">{t.rules_title}</h3>
                                        <p className="text-blue-100 mb-8 max-w-lg font-medium text-lg leading-relaxed">
                                            {t.rules_desc}
                                        </p>
                                        <a href={`/eventos/${data.id}/reglamento?lang=${lang}`} target="_blank" rel="noopener noreferrer">
                                            <Button size="lg" className="bg-white text-blue-700 hover:bg-blue-50 font-black py-7 px-10 rounded-2xl shadow-xl transition-all active:scale-95">
                                                <Download className="w-6 h-6 mr-3" />
                                                {t.download_rules}
                                            </Button>
                                        </a>
                                    </div>
                                </section>
                            )}

                            {data.latitud && data.longitud && (
                                <section className="bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-sm border border-slate-100 dark:border-slate-700">
                                    <div className="p-8 md:p-10 border-b border-slate-50 dark:border-slate-700">
                                        <h3 className="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">{t.location_title}</h3>
                                    </div>
                                    <div className="h-96 w-full bg-slate-100 dark:bg-slate-700">
                                        <iframe
                                            width="100%" height="100%" frameBorder="0" scrolling="no"
                                            src={`https://www.openstreetmap.org/export/embed.html?bbox=${parseFloat(data.longitud)-0.01}%2C${parseFloat(data.latitud)-0.01}%2C${parseFloat(data.longitud)+0.01}%2C${parseFloat(data.latitud)+0.01}&layer=mapnik&marker=${data.latitud}%2C${data.longitud}`}
                                        ></iframe>
                                    </div>
                                </section>
                            )}
                        </div>

                        {/* Sidebar */}
                        <aside className="lg:col-span-4 space-y-8">
                            {/* Identificador del evento */}
                            <div className="bg-blue-600 dark:bg-blue-700 rounded-2xl px-6 py-5 flex items-center gap-4 shadow-lg shadow-blue-200 dark:shadow-blue-900/40">
                                <div className="bg-white/20 rounded-xl p-2.5 flex-shrink-0">
                                    <svg className="w-5 h-5 text-white" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                </div>
                                <div>
                                    <p className="text-blue-100 text-[10px] font-bold uppercase tracking-widest mb-0.5">
                                        Identificador del evento
                                    </p>
                                    <p className="text-white font-mono text-xl font-black tracking-widest">
                                        {data.codigo}
                                    </p>
                                </div>
                            </div>

                            {/* Formulario soporte */}
                            <Card className="rounded-3xl border-none shadow-sm ring-1 ring-slate-900/5 dark:ring-slate-700 overflow-hidden bg-white dark:bg-slate-800">
                                <CardHeader className="bg-slate-50 dark:bg-slate-700/50 border-b border-slate-100 dark:border-slate-700 p-8">
                                    <CardTitle className="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tight">{t.contact_title}</CardTitle>
                                    <p className="text-slate-500 dark:text-slate-400 text-sm font-medium mt-2 leading-snug">
                                        {t.contact_desc}
                                    </p>
                                </CardHeader>
                                <form onSubmit={handleSubmit}>
                                    <CardContent className="p-8 space-y-4">
                                        {status.message && (
                                            <div className={`p-4 rounded-2xl flex items-start gap-3 ${status.type === 'success' ? 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800' : 'bg-rose-50 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 border border-rose-100 dark:border-rose-800'}`}>
                                                {status.type === 'success' ? <CheckCircle className="w-5 h-5 shrink-0" /> : <AlertCircle className="w-5 h-5 shrink-0" />}
                                                <p className="text-sm font-bold leading-tight">{status.message}</p>
                                            </div>
                                        )}
                                        <div className="space-y-2">
                                            <Label htmlFor="nombre" className="text-xs font-black uppercase text-slate-500 dark:text-slate-400">{t.form_name}</Label>
                                            <Input id="nombre" required className="rounded-xl dark:bg-slate-700 dark:border-slate-600 dark:text-white" value={formData.nombre} onChange={(e) => setFormData({...formData, nombre: e.target.value})} />
                                        </div>
                                        <div className="space-y-2">
                                            <Label htmlFor="email" className="text-xs font-black uppercase text-slate-500 dark:text-slate-400">{t.form_email}</Label>
                                            <Input id="email" type="email" required className="rounded-xl dark:bg-slate-700 dark:border-slate-600 dark:text-white" value={formData.email} onChange={(e) => setFormData({...formData, email: e.target.value})} />
                                        </div>
                                        <div className="space-y-2">
                                            <Label htmlFor="asunto" className="text-xs font-black uppercase text-slate-500 dark:text-slate-400">{t.form_subject}</Label>
                                            <Input id="asunto" required className="rounded-xl dark:bg-slate-700 dark:border-slate-600 dark:text-white" value={formData.asunto} onChange={(e) => setFormData({...formData, asunto: e.target.value})} />
                                        </div>
                                        <div className="space-y-2">
                                            <Label htmlFor="mensaje" className="text-xs font-black uppercase text-slate-500 dark:text-slate-400">{t.form_message}</Label>
                                            <Textarea id="mensaje" required className="rounded-xl min-h-[120px] dark:bg-slate-700 dark:border-slate-600 dark:text-white" value={formData.mensaje} onChange={(e) => setFormData({...formData, mensaje: e.target.value})} />
                                        </div>
                                    </CardContent>
                                    <CardFooter className="p-8 pt-0">
                                        <Button type="submit" disabled={isSubmitting} className="w-full bg-slate-900 hover:bg-slate-800 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-black py-7 rounded-2xl transition-all active:scale-95">
                                            {isSubmitting ? t.form_sending : (
                                                <><Send className="w-5 h-5 mr-2" />{t.form_send}</>
                                            )}
                                        </Button>
                                    </CardFooter>
                                </form>
                            </Card>
                        </aside>
                    </div>
                </div>
            </main>

            <Footer t={t} />
            <AdminBar />
        </div>
    );
}
