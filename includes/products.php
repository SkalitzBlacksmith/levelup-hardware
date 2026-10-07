<?php
$categories = [
    'systemen' => 'Desktops & laptops',
    'monitoren' => 'Monitoren',
    'randapparatuur' => 'Randapparatuur',
    'componenten' => 'Componenten',
    'accessoires' => 'Accessoires'
];

$products = [
    'laptop' => [
        'name' => 'Gaming Laptop X1',
        'category' => 'systemen',
        'price' => 1499,
        'description' => 'Speel je favoriete games op een snel 144 Hz scherm. Met 32 GB RAM en een 1 TB SSD heb je ruimte voor je games en schoolwerk.',
        'image' => 'assets/laptop.webp',
        'alt' => 'Gaming Laptop X1',
        'specs' => ['Processor' => 'Intel Core i7', 'Videokaart' => 'RTX 4060 8 GB', 'Geheugen' => '16 GB DDR5', 'Opslag' => '1 TB NVMe SSD', 'Scherm' => '15,6 inch Full HD, 144 Hz']
    ],
    'pc' => [
        'name' => 'Custom Gaming PC',
        'category' => 'systemen',
        'price' => 1999,
        'description' => 'Een complete desktop voor 1440p gaming, met een Ryzen 7, 32 GB RAM en een RTX 4070. Inclusief Wi-Fi en RGB-verlichting.',
        'image' => 'assets/pc.png',
        'alt' => 'Custom Gaming PC',
        'specs' => ['Processor' => 'AMD Ryzen 7', 'Videokaart' => 'RTX 4070 12 GB', 'Geheugen' => '32 GB DDR5', 'Opslag' => '2 TB NVMe SSD', 'Verbinding' => 'Wi-Fi 6 en ethernet']
    ],
    'stream-pc' => [
        'name' => 'LevelUp Stream Station',
        'category' => 'systemen',
        'price' => 2399,
        'description' => 'Stream, game en monteer video op dezelfde desktop. De Ryzen 9 en 64 GB RAM bieden extra ruimte voor zware projecten.',
        'image' => 'assets/pc.png',
        'alt' => 'LevelUp Stream Station',
        'specs' => ['Processor' => 'AMD Ryzen 9', 'Videokaart' => 'RTX 4070 Super 12 GB', 'Geheugen' => '64 GB DDR5', 'Opslag' => '2 TB NVMe SSD', 'Koeling' => '240 mm waterkoeling']
    ],
    'ultrawide' => [
        'name' => 'LevelUp Curve 34',
        'category' => 'monitoren',
        'price' => 449,
        'description' => 'Een gebogen 34 inch monitor voor racegames en multitasking. Het 165 Hz paneel heeft een resolutie van 3440 x 1440.',
        'image' => 'assets/products/monitor.jpg',
        'alt' => 'LevelUp Curve 34',
        'specs' => ['Formaat' => '34 inch curved', 'Resolutie' => '3440 x 1440', 'Verversing' => '165 Hz', 'Paneel' => 'VA', 'Aansluitingen' => 'DisplayPort en HDMI']
    ],
    'oled' => [
        'name' => 'LevelUp OLED 27',
        'category' => 'monitoren',
        'price' => 799,
        'description' => 'Diepe zwarttinten en scherpe beelden op een 27 inch 4K OLED-scherm. Met 144 Hz voor soepel gamen.',
        'image' => 'assets/products/monitor.jpg',
        'alt' => 'LevelUp OLED 27',
        'specs' => ['Formaat' => '27 inch', 'Resolutie' => '3840 x 2160', 'Verversing' => '144 Hz', 'Paneel' => 'OLED', 'Aansluitingen' => 'HDMI 2.1 en DisplayPort']
    ],
    'headset' => [
        'name' => 'Pro Gaming Headset',
        'category' => 'randapparatuur',
        'price' => 199,
        'description' => 'Een comfortabele bedrade headset met 50 mm drivers, surround sound en een afneembare microfoon. Geschikt voor pc en console.',
        'image' => 'assets/headset.webp',
        'alt' => 'Pro Gaming Headset',
        'specs' => ['Drivers' => '50 mm', 'Aansluiting' => 'USB en 3,5 mm', 'Microfoon' => 'Afneembaar', 'Gewicht' => '280 gram', 'Geluid' => 'Virtuele 7.1 surround']
    ],
    'keyboard' => [
        'name' => 'LevelUp Keys 60',
        'category' => 'randapparatuur',
        'price' => 89,
        'description' => 'Een compact mechanisch toetsenbord met rode switches en RGB. Het 60% formaat geeft je muis meer ruimte.',
        'image' => 'assets/products/keyboard.jpg',
        'alt' => '',
        'specs' => ['Formaat' => '60%', 'Switches' => 'Lineair rood', 'Indeling' => 'QWERTY US', 'Aansluiting' => 'USB-C kabel', 'Verlichting' => 'RGB']
    ],
    'mouse' => [
        'name' => 'LevelUp Aim Mouse',
        'category' => 'randapparatuur',
        'price' => 59,
        'description' => 'Een bedrade gamingmuis voor snelle shooters. Stel de optische sensor in tot 16.000 DPI en gebruik de zes programmeerbare knoppen.',
        'image' => 'assets/products/mouse.jpg',
        'alt' => 'LevelUp Aim Mouse',
        'specs' => ['Sensor' => 'Optisch, 16.000 DPI', 'Gewicht' => '65 gram', 'Knoppen' => '6', 'Aansluiting' => 'USB', 'Polling rate' => '1000 Hz']
    ],
    'gpu' => [
        'name' => 'LevelUp RTX Upgrade',
        'category' => 'componenten',
        'price' => 599,
        'description' => 'Upgrade je desktop met een RTX 4070 met 12 GB videogeheugen en twee ventilatoren. Controleer vooraf je voeding en de ruimte in je kast.',
        'image' => 'assets/products/gpu.jpg',
        'alt' => 'LevelUp RTX Upgrade',
        'specs' => ['Chip' => 'RTX 4070', 'Geheugen' => '12 GB GDDR6X', 'Koeling' => 'Twee ventilatoren', 'Voeding advies' => '650 watt', 'Aansluitingen' => 'HDMI en DisplayPort']
    ],
    'cooler' => [
        'name' => 'LevelUp Air Cooler',
        'category' => 'componenten',
        'price' => 69,
        'description' => 'Houd je processor koel met een dubbele torenkoeler en twee 120 mm ventilatoren. Geschikt voor AM5 en LGA1700.',
        'image' => 'assets/products/cooler.jpg',
        'alt' => 'LevelUp Air Cooler',
        'specs' => ['Type' => 'Luchtkoeler, dubbele toren', 'Ventilatoren' => '2 x 120 mm', 'Sockets' => 'AM5 en LGA1700', 'Hoogte' => '160 mm', 'Aansturing' => 'PWM']
    ],
    'deskmat' => [
        'name' => 'LevelUp Deskmat XXL',
        'category' => 'accessoires',
        'price' => 29,
        'description' => 'Een zachte bureaumat van 900 x 400 mm voor je muis en toetsenbord. De rubberen onderkant houdt de mat op zijn plek.',
        'image' => 'assets/products/desk.jpg',
        'alt' => 'LevelUp Deskmat XXL',
        'specs' => ['Afmetingen' => '900 x 400 mm', 'Dikte' => '3 mm', 'Onderkant' => 'Antislip rubber', 'Rand' => 'Gestikt', 'Kleur' => 'Zwart']
    ],
    'hub' => [
        'name' => 'LevelUp USB Hub',
        'category' => 'accessoires',
        'price' => 39,
        'description' => 'Sluit meer accessoires aan met vier USB-A poorten. De aluminium USB-C hub past bij je laptop of desktop.',
        'image' => 'assets/products/desk.jpg',
        'alt' => 'LevelUp USB Hub',
        'specs' => ['Ingang' => 'USB-C', 'Poorten' => '4 x USB-A', 'Snelheid' => 'Tot 5 Gbit/s', 'Materiaal' => 'Aluminium', 'Kabel' => '20 cm']
    ],
];
