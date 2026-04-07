import React, { useState, useEffect } from 'react';
import { Head, Link } from '@inertiajs/react';
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Card, CardHeader, CardTitle, CardContent, CardFooter } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Label } from "@/components/ui/label";
import { CalendarDays, MapPin, ArrowLeft, Download, Info, Send, CheckCircle, AlertCircle } from "lucide-react";
import LanguageSelector from '@/components/LanguageSelector';
import { translations } from '@/lib/translations';

export default function Show({ evento }) {
    const urlParams = new URLSearchParams(window.location.search);
    const [lang, setLang] = useState(urlParams.get('lang') || localStorage.getItem('lang') || 'es');
    const t = translations[lang];
    const data = evento.data || evento;

    useEffect(() => {
        localStorage.setItem('lang', lang);
        // Actualizar el parámetro lang en la URL sin recargar para que si el usuario copia el link, mantenga el idioma
        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?lang=' + lang;
        window.history.pushState({path:newUrl}, '', newUrl);
    }, [lang]);

    const getVal = (field) => {
        if (lang === 'en' && data[field + '_en']) return data[field + '_en'];
        return data[field];
    };

    // Formulario de soporte (Ticket)
    const [formData, setFormData] = useState({
        nombre: '',
        email: '',
        asunto: '',
        mensaje: ''
    });
    const [status, setStatus] = useState({ type: null, message: '' });
    const [isSubmitting, setIsSubmitting] = useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setIsSubmitting(true);
        setStatus({ type: null, message: '' });

        try {
            const response = await fetch(`/api/public/eventos/${data.id}/tickets`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                setStatus({ type: 'success', message: t.form_success });
                setFormData({ nombre: '', email: '', asunto: '', mensaje: '' });
            } else {
                setStatus({ type: 'error', message: result.message || 'Error' });
            }
        } catch (error) {
            setStatus({ type: 'error', message: 'Error' });
        } finally {
            setIsSubmitting(false);
        }
    };

    return (
        <div className="min-h-screen bg-slate-50">
            <Head title={`${getVal('nombre')} - EventRUN!`} />
            
            <header className="bg-white/80 backdrop-blur-md border-b sticky top-0 z-30">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                    <div className="flex items-center gap-4">
                        <Link href="/" className="inline-flex items-center justify-center rounded-full w-10 h-10 hover:bg-slate-100 transition-all">
                            <ArrowLeft className="w-5 h-5 text-slate-600" />
                        </Link>
                        <h1 className="text-xl font-bold text-slate-900 tracking-tight line-clamp-1">{getVal('nombre')}</h1>
                    </div>
                    <LanguageSelector currentLang={lang} onChange={setLang} />
                </div>
            </header>

            <main>
                <div className="relative w-full h-[50vh] min-h-[400px] overflow-hidden">
                    <img 
                        src={data.imagen || '/placeholder-event.jpg'} 
                        alt={getVal('nombre')}
                        className="w-full h-full object-cover"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                    <div className="absolute bottom-0 left-0 w-full p-8 md:p-16">
                        <div className="max-w-7xl mx-auto">
                            <Badge className="mb-4 bg-blue-600 border-none px-4 py-1 text-xs font-black uppercase tracking-widest shadow-lg text-white">
                                {data.estado?.toUpperCase()}
                            </Badge>
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
                        <div className="lg:col-span-8 space-y-12">
                            <section className="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100">
                                <div className="flex items-center gap-3 mb-8">
                                    <div className="w-2 h-8 bg-blue-600 rounded-full"></div>
                                    <h3 className="text-2xl font-black text-slate-900 uppercase tracking-tighter">
                                        {t.details_title}
                                    </h3>
                                </div>
                                <div className="prose prose-slate max-w-none prose-lg">
                                    <p className="text-slate-600 leading-relaxed whitespace-pre-wrap font-medium">
                                        {getVal('descripcion')}
                                    </p>
                                </div>
                            </section>

                            {(data.reglamento || data.reglamento_en) && (
                                <section className="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 md:p-12 text-white shadow-2xl overflow-hidden relative group">
                                    <div className="relative z-10">
                                        <h3 className="text-3xl font-black mb-4 tracking-tighter">{t.rules_title}</h3>
                                        <p className="text-blue-100 mb-8 max-w-lg font-medium text-lg leading-relaxed">
                                            {t.rules_desc}
                                        </p>
                                        <a href={`/eventos/${data.id}/reglamento?lang=${lang}`} target="_blank" rel="noopener noreferrer">
                                            <Button size="lg" className="bg-white text-blue-700 hover:bg-blue-50 font-black py-7 px-10 rounded-2xl shadow-xl transition-all active:scale-95 group/btn">
                                                <Download className="w-6 h-6 mr-3" />
                                                {t.download_rules}
                                            </Button>
                                        </a>
                                    </div>
                                </section>
                            )}

                            {data.latitud && data.longitud && (
                                <section className="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100">
                                    <div className="p-8 md:p-10 border-b border-slate-50">
                                        <h3 className="text-2xl font-black text-slate-900 uppercase tracking-tighter">{t.location_title}</h3>
                                    </div>
                                    <div className="h-96 w-full bg-slate-100">
                                        <iframe
                                            width="100%" height="100%" frameBorder="0" scrolling="no"
                                            src={`https://www.openstreetmap.org/export/embed.html?bbox=${parseFloat(data.longitud)-0.01}%2C${parseFloat(data.latitud)-0.01}%2C${parseFloat(data.longitud)+0.01}%2C${parseFloat(data.latitud)+0.01}&layer=mapnik&marker=${data.latitud}%2C${data.longitud}`}
                                        ></iframe>
                                    </div>
                                </section>
                            )}
                        </div>

                        <aside className="lg:col-span-4 space-y-8">
                            <Card className="rounded-3xl border-none shadow-sm ring-1 ring-slate-900/5 overflow-hidden">
                                <CardHeader className="bg-slate-50 border-b border-slate-100 p-8">
                                    <CardTitle className="text-xl font-black text-slate-900 uppercase tracking-tight">{t.contact_title}</CardTitle>
                                    <p className="text-slate-500 text-sm font-medium mt-2 leading-snug">
                                        {t.contact_desc}
                                    </p>
                                </CardHeader>
                                <form onSubmit={handleSubmit}>
                                    <CardContent className="p-8 space-y-4">
                                        {status.message && (
                                            <div className={`p-4 rounded-2xl flex items-start gap-3 ${status.type === 'success' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'bg-rose-50 text-rose-700 border border-rose-100'}`}>
                                                {status.type === 'success' ? <CheckCircle className="w-5 h-5 shrink-0" /> : <AlertCircle className="w-5 h-5 shrink-0" />}
                                                <p className="text-sm font-bold leading-tight">{status.message}</p>
                                            </div>
                                        )}
                                        <div className="space-y-2">
                                            <Label htmlFor="nombre" className="text-xs font-black uppercase text-slate-500">{t.form_name}</Label>
                                            <Input id="nombre" required className="rounded-xl" value={formData.nombre} onChange={(e) => setFormData({...formData, nombre: e.target.value})} />
                                        </div>
                                        <div className="space-y-2">
                                            <Label htmlFor="email" className="text-xs font-black uppercase text-slate-500">{t.form_email}</Label>
                                            <Input id="email" type="email" required className="rounded-xl" value={formData.email} onChange={(e) => setFormData({...formData, email: e.target.value})} />
                                        </div>
                                        <div className="space-y-2">
                                            <Label htmlFor="asunto" className="text-xs font-black uppercase text-slate-500">{t.form_subject}</Label>
                                            <Input id="asunto" required className="rounded-xl" value={formData.asunto} onChange={(e) => setFormData({...formData, asunto: e.target.value})} />
                                        </div>
                                        <div className="space-y-2">
                                            <Label htmlFor="mensaje" className="text-xs font-black uppercase text-slate-500">{t.form_message}</Label>
                                            <Textarea id="mensaje" required className="rounded-xl min-h-[120px]" value={formData.mensaje} onChange={(e) => setFormData({...formData, mensaje: e.target.value})} />
                                        </div>
                                    </CardContent>
                                    <CardFooter className="p-8 pt-0">
                                        <Button type="submit" disabled={isSubmitting} className="w-full bg-slate-900 hover:bg-slate-800 text-white font-black py-7 rounded-2xl transition-all active:scale-95">
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
            <footer className="bg-white border-t py-12">
                <div className="max-w-7xl mx-auto px-4 text-center">
                    <p className="text-slate-400 text-xs font-bold uppercase tracking-widest">{t.footer_copy}</p>
                </div>
            </footer>
        </div>
    );
}
