import React from 'react';

export default function LanguageSelector({ currentLang, onChange }) {
    return (
        <div className="flex gap-2">
            <button 
                onClick={() => onChange('es')}
                className={`p-1 rounded-md transition-all ${currentLang === 'es' ? 'ring-2 ring-blue-500 scale-110' : 'opacity-50 hover:opacity-100'}`}
                title="Español"
            >
                <img src="https://flagcdn.com/w40/es.png" alt="ES" className="w-6 h-4 object-cover rounded-sm shadow-sm" />
            </button>
            <button 
                onClick={() => onChange('en')}
                className={`p-1 rounded-md transition-all ${currentLang === 'en' ? 'ring-2 ring-blue-500 scale-110' : 'opacity-50 hover:opacity-100'}`}
                title="English"
            >
                <img src="https://flagcdn.com/w40/gb.png" alt="EN" className="w-6 h-4 object-cover rounded-sm shadow-sm" />
            </button>
        </div>
    );
}
