<?php

use App\Models\Evento;

$e4 = Evento::find(4);
if ($e4) {
    $e4->nombre_en = 'Boston Marathon 2026';
    $e4->descripcion_en = 'The oldest annual marathon in the world, famous for the tough "Heartbreak Hill".';
    $e4->reglamento_en = "BOSTON MARATHON 2026 - B.A.A. OFFICIAL RULES\n\n1. QUALIFICATION: Boston requires certified minimum qualification times. Compliance with these times will be audited before final confirmation is issued.\n\n2. TRANSPORTATION TO HOPKINTON: The start is in Hopkinton. Official transportation by bus from Boston Common is the only guaranteed way to arrive at the start on time.\n\n3. SECURITY AT ATHLETE'S VILLAGE: No bags of any kind are allowed on buses to Hopkinton. Use the bag check service in Boston before boarding the bus.\n\n4. COURSE RULES: It is forbidden to receive external assistance (water, clothing, food) outside official points. Failure to comply with this will result in immediate disqualification.\n\n5. HEARTBREAK HILL (Mile 20): Use caution in this area. Medical services are reinforced in the last 10 KM due to the toughness of the terrain.\n\n6. WEATHER: The race is held rain or shine. In case of severe lightning, evacuation protocols to designated shelters will be activated.\n\n7. PRIZES: Cash prizes are only awarded to runners in the 'Elite' category who have passed the corresponding anti-doping controls.";
    $e4->save();
}

$e6 = Evento::find(6);
if ($e6) {
    $e6->nombre_en = 'Chicago Marathon 2026';
    $e6->descripcion_en = 'Explore the most iconic neighborhoods of the "Windy City" on a flat and fast course.';
    $e6->reglamento_en = "BANK OF AMERICA CHICAGO MARATHON 2026 RULES\n\n1. PARTICIPATION: Limit of 45,000 participants. The bib must be visible at all times to access Grant Park.\n\n2. EVENT ALERT SYSTEM (EAS): We use a color-coded system to indicate race conditions. Green: Low, Yellow: Moderate, Red: High, Black: Extreme/Cancelled. Watch for signs at each aid station.\n\n3. START AND FINISH: Both located in Grant Park. Access to the post-race area (Abbott 27.2 Mile Post-Race Party) is exclusive to runners and one guest with a pass.\n\n4. PACERS: Nike Pace Team available for times from 3:00 to 5:45 hours. Join them in the corresponding corrals.\n\n5. MEDICAL DEVICES: Participants requiring a wheelchair or handbike must be registered in the corresponding division for safety reasons.\n\n6. WEATHER CANCELLATION POLICY: If the temperature exceeds 30°C (WBGT), the race may be shortened or converted into a non-competitive walk for medical safety.\n\n7. PHOTOGRAPHY: Official photos will be available 48h after the event. Use of private drones is prohibited throughout the race's airspace.";
    $e6->save();
}

echo "Translations updated successfully.\n";
