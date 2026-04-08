<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Evento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear Usuarios
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'administrador',
        ]);

        $gestor = User::create([
            'name' => 'Gestor User',
            'email' => 'gestor@test.com',
            'password' => Hash::make('password'),
            'role' => 'gestor',
        ]);

        $publico = User::create([
            'name' => 'Public User',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'invitado',
        ]);

        // 1. MARATÓN DE NUEVA YORK
        Evento::create([
            'user_id' => $gestor->id,
            'nombre' => 'Maratón de Nueva York 2026',
            'descripcion' => 'La carrera más emblemática del mundo a través de los cinco distritos de la Gran Manzana.',
            'fecha' => Carbon::parse('2026-11-01'),
            'imagen' => 'https://images.pexels.com/photos/378570/pexels-photo-378570.jpeg?auto=compress&cs=tinysrgb&w=800',
            'estado' => 'publicado',
            'reglamento' => "REGLAMENTO OFICIAL TCS NEW YORK CITY MARATHON 2026\n\n" .
                "1. REQUISITOS DE PARTICIPACIÓN: Los corredores deben tener al menos 18 años el día de la carrera. Es obligatorio presentar una identificación oficial para retirar el dorsal.\n\n" .
                "2. LOGÍSTICA DE SALIDA (Staten Island): La salida se organiza en 4 oleadas (Waves) para evitar aglomeraciones. Wave 1: 08:30 AM, Wave 2: 09:10 AM, Wave 3: 09:50 AM, Wave 4: 10:30 AM. El acceso al Verrazzano-Narrows Bridge se cerrará 15 minutos antes de cada oleada.\n\n" .
                "3. DORSAL Y CHIP: El dorsal debe colocarse visiblemente en el pecho. El chip de cronometraje está integrado en el dorsal; no debe doblarse ni manipularse. Sin dorsal visible, el corredor será retirado del circuito.\n\n" .
                "4. TIEMPO LÍMITE: El circuito se cerrará progresivamente. El tiempo máximo oficial es de 6 horas y 30 minutos desde la salida de la última oleada. Tras este tiempo, los servicios de seguridad y avituallamiento no están garantizados.\n\n" .
                "5. AVITUALLAMIENTO: Puestos de agua y Gatorade cada milla desde la milla 3 hasta la 25 (excepto en los puentes). Geles energéticos disponibles en las millas 12 y 18.\n\n" .
                "6. ARTÍCULOS PROHIBIDOS: No se permiten mochilas de hidratación superiores a 1L, cochecitos de bebé, mascotas, ni auriculares que aíslen completamente del sonido ambiente.\n\n" .
                "7. CANCELACIONES: Bajo ninguna circunstancia se reembolsará el importe de la inscripción. Se permite el aplazamiento (deferral) a 2027 notificándolo antes del 15 de octubre.",
        ]);

        // 2. MARATÓN DE BERLÍN
        Evento::create([
            'user_id' => $gestor->id,
            'nombre' => 'Maratón de Berlín 2026',
            'descripcion' => 'El circuito más rápido del mundo donde se baten todos los récords mundiales de velocidad.',
            'fecha' => Carbon::parse('2026-09-27'),
            'imagen' => 'https://images.pexels.com/photos/1128416/pexels-photo-1128416.jpeg?auto=compress&cs=tinysrgb&w=800',
            'estado' => 'publicado',
            'reglamento' => "BMW BERLIN-MARATHON 2026 OFFICIAL REGULATIONS\n\n" .
                "1. CONDICIONES GENERALES: El evento se rige por las normas de la World Athletics (WA). La prueba es exclusivamente para corredores a pie y handbikers en sus categorías correspondientes.\n\n" .
                "2. EXPO Y DORSALES: La recogida de dorsales se realizará exclusivamente en el aeropuerto Tempelhof (Marathon Expo) los días 24, 25 y 26 de septiembre. NO se entregarán dorsales el día de la carrera.\n\n" .
                "3. HORARIOS DE SALIDA: La salida oficial es a las 09:15 AM desde la calle Straße des 17. Juni. Se requiere estar en el bloque de salida 45 minutos antes.\n\n" .
                "4. SERVICIO DE GUARDARROPA: Solo se aceptarán las bolsas oficiales transparentes entregadas por la organización. No se permiten maletas ni bolsas privadas en la zona de salida/meta.\n\n" .
                "5. CONTROL DE TIEMPO: Se utiliza el sistema MIKA Tag. Los puntos de control están situados cada 5 km y en la media maratón. Es obligatorio pasar por todas las alfombras.\n\n" .
                "6. ASISTENCIA MÉDICA: Disponemos de 40 puntos de primeros auxilios a lo largo del recorrido coordinados por la Cruz Roja Alemana.\n\n" .
                "7. POLÍTICA DE RESIDUOS: Tirar vasos o geles fuera de las 'Zonas de Desecho' señalizadas puede ser motivo de descalificación para mantener la limpieza de la ciudad.",
        ]);

        // 3. MARATÓN DE LONDRES
        Evento::create([
            'user_id' => $gestor->id,
            'nombre' => 'Maratón de Londres 2026',
            'descripcion' => 'Una carrera histórica que recorre el Támesis y termina frente al Palacio de Buckingham.',
            'fecha' => Carbon::parse('2026-04-26'),
            'imagen' => 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&w=800&q=80',
            'estado' => 'publicado',
            'reglamento' => "TCU LONDON MARATHON 2026 - REGLAS DE LA COMPETICIÓN\n\n" .
                "1. ELEGIBILIDAD: Solo atletas registrados oficialmente pueden participar. Queda prohibida la reventa de dorsales; el uso de un dorsal ajeno conlleva la expulsión de por vida de los eventos de la London Marathon Events.\n\n" .
                "2. ZONAS DE SALIDA: Existen tres zonas de salida (Red, Blue, Green) situadas en Greenwich Park y Blackheath. Verifique su color de salida en su correo de confirmación.\n\n" .
                "3. TRANSPORTE: Los corredores tienen transporte gratuito en trenes de Southeastern, DLR y London Underground hacia las zonas de salida presentando su dorsal.\n\n" .
                "4. HIDRATACIÓN: Agua Buxton disponible en botellas de 250ml en intervalos regulares. Recomendamos no beber en cada puesto para evitar la hiponatremia.\n\n" .
                "5. DISFRACES: Se permiten disfraces siempre que no excedan el ancho de un corredor y no resulten ofensivos o peligrosos para otros participantes.\n\n" .
                "6. FINISHER: La medalla y la camiseta de finalista se entregan exclusivamente tras cruzar la línea de meta en The Mall y tras verificar el chip de cronometraje.\n\n" .
                "7. SEGURO: La organización recomienda encarecidamente disponer de un seguro de accidentes personal.",
        ]);

        // 4. MARATÓN DE BOSTON
        Evento::create([
            'user_id' => $gestor->id,
            'nombre' => 'Maratón de Boston 2026',
            'descripcion' => 'La maratón anual más antigua del mundo, famosa por la dura "Heartbreak Hill".',
            'fecha' => Carbon::parse('2026-04-20'),
            'imagen' => 'https://images.unsplash.com/photo-1452626038306-9aae5e071dd3?auto=format&fit=crop&w=800&q=80',
            'estado' => 'publicado',
            'reglamento' => "BOSTON MARATHON 2026 - B.A.A. OFFICIAL RULES\n\n" .
                "1. CALIFICACIÓN: Boston requiere tiempos mínimos de calificación certificados. El cumplimiento de estos tiempos será auditado antes de emitir la confirmación final.\n\n" .
                "2. TRANSPORTE A HOPKINTON: La salida es en Hopkinton. El transporte oficial en autobuses desde Boston Common es la única forma garantizada de llegar a tiempo a la salida.\n\n" .
                "3. SEGURIDAD EN EL PUEBLO DE ATLETAS: No se permiten bolsas de ningún tipo en los autobuses hacia Hopkinton. Use el servicio de depósito de bolsas en Boston antes de subir al bus.\n\n" .
                "4. REGLAS DEL RECORRIDO: Está prohibido recibir asistencia externa (agua, ropa, comida) fuera de los puntos oficiales. Incumplir esto supone la descalificación inmediata.\n\n" .
                "5. HEARTBREAK HILL (Milla 20): Mantenga la precaución en esta zona. Los servicios médicos están reforzados en los últimos 10 KM debido a la dureza del terreno.\n\n" .
                "6. CLIMATOLOGÍA: La carrera se celebra llueva o haga sol. En caso de tormenta eléctrica severa, se activarán los protocolos de evacuación a refugios señalizados.\n\n" .
                "7. PREMIOS: Los premios en metálico solo se otorgan a los corredores en la categoría 'Elite' que hayan pasado los controles antidopaje correspondientes.",
        ]);

        // 5. MARATÓN DE TOKIO
        Evento::create([
            'user_id' => $gestor->id,
            'nombre' => 'Maratón de Tokio 2026',
            'descripcion' => 'Vive la mezcla perfecta de tradición y futurismo en el corazón de la capital japonesa.',
            'fecha' => Carbon::parse('2026-03-01'),
            'imagen' => 'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=800&q=80',
            'estado' => 'publicado',
            'reglamento' => "TOKYO MARATHON 2026 REGULATIONS\n\n" .
                "1. ACCESO Y SEGURIDAD: Se realizarán controles de temperatura y seguridad en todos los puntos de acceso. No se permite la entrada a la zona de salida sin haber pasado el control previo.\n\n" .
                "2. PUNTO DE SALIDA: Metropolitan Government Building en Shinjuku. Los cajones abren a las 07:00 AM y cierran estrictamente a las 08:45 AM.\n\n" .
                "3. TIEMPOS DE CORTE (Cut-off): Tokio es muy estricto. Hay 9 puntos de control con tiempos de cierre específicos. Si un corredor no llega al punto antes del cierre, deberá subir al autobús de retirada.\n\n" .
                "4. ALIMENTACIÓN: Se ofrecen productos locales como mochi y fruta, además de agua e isotónicos. Consulte el mapa de avituallamientos para alergias.\n\n" .
                "5. EQUIPAMIENTO: Se permite el uso de GPS y relojes inteligentes. El uso de cámaras de acción (GoPro) está limitado a arneses pectorales, nunca en la mano o palos selfie.\n\n" .
                "6. CONDUCTA: Se espera un comportamiento respetuoso (Omotenashi). Gritar excesivamente o molestar a los residentes puede ser penalizado.\n\n" .
                "7. RECOGIDA DE PERTENENCIAS: Tras la meta cerca de la Estación de Tokio, siga las señales de color para localizar su camión de equipaje.",
        ]);

        // 6. MARATÓN DE CHICAGO
        Evento::create([
            'user_id' => $gestor->id,
            'nombre' => 'Maratón de Chicago 2026',
            'descripcion' => 'Recorre los barrios más icónicos de la "Windy City" en un circuito llano y rápido.',
            'fecha' => Carbon::parse('2026-10-11'),
            'imagen' => 'https://images.pexels.com/photos/2190283/pexels-photo-2190283.jpeg?auto=compress&cs=tinysrgb&w=800',
            'estado' => 'publicado',
            'reglamento' => "BANK OF AMERICA CHICAGO MARATHON 2026 RULES\n\n" .
                "1. PARTICIPACIÓN: Límite de 45,000 participantes. El dorsal debe estar visible en todo momento para acceder a Grant Park.\n\n" .
                "2. SISTEMA DE BANDERAS (EAS): Usamos un sistema de colores para indicar las condiciones de la carrera. Verde: Bueno, Amarillo: Precaución, Rojo: Peligro, Negro: Carrera Cancelada. Esté atento a los carteles en cada puesto de auxilio.\n\n" .
                "3. SALIDA Y META: Ambas situadas en Grant Park. El acceso a la zona de post-carrera (Abbott 27.2 Mile Post-Race Party) es exclusivo para corredores y un acompañante con pase.\n\n" .
                "4. ASISTENCIA DE MARCAPASOS (Pacers): Nike Pace Team disponible para tiempos desde 3:00 hasta 5:45 horas. Únase a ellos en los cajones correspondientes.\n\n" .
                "5. DISPOSITIVOS MÉDICOS: Los participantes que requieran silla de ruedas o handbike deben estar inscritos en la división correspondiente por motivos de seguridad.\n\n" .
                "6. POLÍTICA DE CANCELACIÓN POR CLIMA: Si la temperatura supera los 30°C (WBGT), la carrera puede ser recortada o convertida en marcha no competitiva por seguridad médica.\n\n" .
                "7. FOTOGRAFÍA: Las fotos oficiales estarán disponibles 48h después del evento. Está prohibido el uso de drones privados en todo el espacio aéreo de la carrera.",
        ]);
    }
}
