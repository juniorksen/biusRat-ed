<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parque</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        body {
            background-color: black;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }

        nav {
            text-align: left;
            width: 100%;
            margin-top: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-start;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            font-size: 20px;
            color: #ff6600;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video-content {
            text-align: center;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .video-item {
            margin-bottom: 20px;
            width: 100%;
        }

        .video-title {
            margin: 10px 0;
        }

        .video-description {
            margin: 10px 0;
        }

        video {
            display: block;
            margin: 0 auto;
            width: 100%;
            max-width: 800px;
        }

        .calorias {
            margin-top: 40px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
        }

        .caloria-item {
            flex-basis: calc(33.33% - 20px);
            margin-bottom: 20px;
        }

        .caloria-content {
            text-align: center;
        }

        .caloria-content img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .caloria-title {
            margin: 10px 0;
            color: #ff6600;
        }

        .caloria-description {
            margin: 10px 0;
        }

        h2 {
            color: #ff6600;
            text-align: center;
            width: 100%;
        }

        .pagination {
            list-style: none;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            color: #ff6600;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ff6600;
            border-radius: 5px;
        }

        .pagination li.active a {
            background-color: #ff6600;
            color: #fff;
        }

        #mapid {
            height: 500px;
            width: 1000px;
            margin: 5px auto 0; /* Ajusta el margen superior según el espacio deseado */
            border: 2px solid #ccc;
            border-radius: 8px;
        }

        #menu-container {
            margin-top: 40px;
            margin-left: 182px; 
        }

        #menu-select {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 150px;
            cursor: pointer;
            margin-bottom: 20px; /* Ajusta según el espacio deseado */
        }

        #menu-options {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 150px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        #menu-options li {
            padding: 10px;
            cursor: pointer;
        }

        #menu-options li:hover {
            background-color: #eee;
        }

        #contenedor1 {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        #contenido1 {
            display: inline-block;
            text-align: left;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="{{ route('ejercicios') }}">Crear videos</a></li>
            <li><a href="{{ route('todos') }}">Para ti</a></li>
        </ul>
    </nav>

    <div id="menu-container">
        <select id="menu-select">
            <option value="">Seleccionar lugar</option>
            <option value="universidad_llanos">Universidad de los llanos</option>
            <option value="parque_fundadores">Parque fundadores</option>
            <option value="parque_Santa_Helena">Parque Santa Helena</option>
        </select>
        <ul id="menu-options">
            <li data-location="universidad_llanos">Universidad de los llanos</li>
            <li data-location="parque_fundadores">Parque fundadores</li>
            <li data-location="parque_Santa_Helena">Parque Santa Helena</li>
        </ul>
    </div>

    <div id="mapid"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        const locations = [
            {
                name: "Universidad de los llanos",
                lat: 4.0750,
                lng: -73.5829,
                dataValue: "universidad_llanos"
            },
            {
                name: "Parque fundadores",
                lat: 4.12264,
                lng: -73.64233,
                dataValue: "parque_fundadores"
            },
            {
                name: "Parque Santa Helena",
                lat: 4.14801,
                lng: -73.60588,
                dataValue: "parque_Santa_Helena"
            }
        ];

        const menuSelect = document.getElementById("menu-select");
        const menuOptions = document.getElementById("menu-options");
        const menuItems = menuOptions.querySelectorAll("li");

        // Event listener for select change
        menuSelect.addEventListener("change", function () {
            const selectedLocation = locations.find(
                (loc) => loc.dataValue === this.value
            );

            if (selectedLocation) {
                map.setView([selectedLocation.lat, selectedLocation.lng], 12);
            }
        });

        // Event listeners for menu items
        for (const item of menuItems) {
            item.addEventListener("click", function () {
                const locationName = this.textContent;
                const matchingLocation = locations.find(
                    (location) => location.name === locationName
                );

                if (matchingLocation) {
                    const { lat, lng } = matchingLocation;
                    map.setView([lat, lng], 12);
                }
            });
        }

        let map = L.map('mapid').setView([4.11635,-73.60968], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([4.0750,-73.5829]).addTo(map).bindPopup('Universidad de los llanos.');
        L.marker([4.12264,-73.64233]).addTo(map).bindPopup('Parque fundadores');
        L.marker([4.14801,-73.60588]).addTo(map).bindPopup('Parque Santa Helena'); 

    </script>
</body>
</html>

