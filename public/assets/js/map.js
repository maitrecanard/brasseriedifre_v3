const map = {

    /// sélectino des diverses selections du dom
    // récupération de la valeur de l'input
    inputValueAddress: document.querySelector('#partner_adress').value,
    // sélection de l'input entier
    inputAddress: document.querySelector('#partner_adress'),
    // Séléction de la div qui génère la carte
    detailsMap: document.querySelector('#detailsMap'),
    // sélection de l'input image
    content: document.querySelector('#partner_phone'),

    init: function() {

        // on vérifie que l'input image existe
        if(map.content){
            // si l'input existe, on initialise un écouteur de clique
            map.content.addEventListener('click', map.settingAddress);
        }
        // On initialise un écouteur ciblant l'input address
        map.inputAddress.addEventListener('input', map.saveAddress);

        // si le champ address est déjà rempli, on lance directement la recherche vers l'api
        if(map.inputValueAddress) {
            map.sendMap(map.inputValueAddress);
        } 
            
    },

    // fonction qui récupère la valeur de l'input pour envoyer vers l'api
    settingAddress: function(e) {
      if(e.type === 'click') {
        map.sendMap(map.inputValueAddress); 
      } 
        
    },

    // on écoute toutes les modifications apporté au champ address
    saveAddress: function(e) {
         address = e.target.value;
         map.inputValueAddress = address;
    },

    // on envoi la valeur de l'input vers l'api
    sendMap: function(address) {

        const config = {
            method: 'GET',
            mode: 'cors',
            cache:'no-cache',
        }
        const fullUrl = `https://nominatim.openstreetmap.org/search?q=${address}&format=json&addressdetails=1&limit=1&polygon_svg=1`;
        const fecthMap = async () => {
            try {
                const res = await fetch(fullUrl, config);
                if(!res.ok) {
                    throw new Error(res.status);
                }
                const data = await res.json();

                let lat = data[0]['lat']
                let lon = data[0]['lon']
      
                map.generateMap(lat,lon);

            } catch (error) {
                map.detailsMap.classList.add('no-map');
                map.detailsMap.textContent = "Carte non disponible actuellement";
            }
        }
            fecthMap();
    },

    // on génère la carte
    generateMap: function(lat,lon) {

       // const info = map.latLon
       // const lat = info[0];
       // const lon = info[1];


        let mymap
        mymap = L.map('detailsMap').setView([lat,lon], 16)
        L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
            attribution: 'Carte fournie par Wikimedia',
            minZoom: 1,
            maxZoom: 20
        }).addTo(mymap);
        map.detailsMap.classList.add('map');

        // on génère la marque bleu (cible sur la carte)
        let marker = L.marker([lat,lon]).addTo(mymap);
    }

}