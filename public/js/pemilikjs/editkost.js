import { createPopper } from '/project_paw/node_modules/@popperjs/core/lib/index.js';


// Map Display
const map = L.map('map').setView([0.5, 30.5], 15); // Jakarta

const markerLayer = L.layerGroup().addTo(map);

const alidade = 'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png';
const openstreetmap = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const stadiamaps = 'https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png';

L.tileLayer(stadiamaps, {
maxZoom: 19,
attribution: '© OpenStreetMap contributors'
}).addTo(map);

L.marker([0.5, 30.5]).addTo(markerLayer);






// Map SET

const namaLokasiMap = document.getElementById("nama-lokasi-map");
const cariLokasiMap = document.getElementById("cari-lokasi-map")
const mapSet = L.map('map-set').setView([20, 20], 5);
const latSet = document.getElementById('lat-set');
const longSet = document.getElementById('long-set');
const latInput = document.getElementById('lat-input');
const longInput = document.getElementById('long-input');

const markerLayerMapSet = L.layerGroup().addTo(mapSet);

L.tileLayer(stadiamaps, {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors'
}).addTo(mapSet);

L.marker([20, 20]).addTo(markerLayerMapSet);

mapSet.on('click', (e) => {
    mapSet.setView([e.latlng.lat, e.latlng.lng],e.target._zoom);
    markerLayerMapSet.clearLayers();
    L.marker([e.latlng.lat, e.latlng.lng]).addTo(markerLayerMapSet);
    latSet.innerHTML = `lat: ${e.latlng.lat}`;
    longSet.innerHTML = `long: ${e.latlng.lng}`;
});

cariLokasiMap.addEventListener('click', async (e) => {
    console.log("a")
    const url = `https://nominatim.openstreetmap.org/search?q=${namaLokasiMap.value}&format=json&addressdetails=1`;
    

    await fetch(url).then(async (result) => {
        await result.json().then((r) => {
            mapSet.setView([r[0].lat, r[0].lon], 15);
            markerLayerMapSet.clearLayers();
            L.marker([r[0].lat, r[0].lon]).addTo(markerLayerMapSet)
        })
    });

    
})









// POPPER JS

const editLokasi = document.getElementById("edit-lokasi");
const editLokasiKostToolTip = document.getElementById("edit-lokasi-kost-tooltip");
const editGambarKost = document.getElementById("edit-gambar-kost");
const editGambarKostTooltip = document.getElementById("edit-gambar-kost-tooltip");
const editFasilitas = document.getElementById("edit-fasilitas");
const editFasiltasTooltip = document.getElementById("edit-fasilitas-tooltip");
const buttonAddImageFromModal = document.getElementById("button-add-image-from-modal");
const buttonAddImageFromModalTooltip = document.getElementById("button-add-image-from-modal-tooltip");

console.log(buttonAddImageFromModal);

const popperEditLokasi = createPopper(editLokasi, editLokasiKostToolTip, {
    placements: "right",
    modifiers: [
    {
        name: 'offset',
        options: {
        offset: [0, 8],
        },
    },
    ],
});

const popperEditGambarKost = createPopper(editGambarKost, editGambarKostTooltip, {
    placements: "right",
    modifiers: [
    {
        name: 'offset',
        options: {
        offset: [0, 8],
        },
    },
    ],
});

const popperFasilitas = createPopper(editFasilitas, editFasiltasTooltip, {
    placements: "right",
    modifiers: [
        {
            name: 'offset',
            options: {
            offset: [0, 8],
            },
        },
    ],
});

const popperButtonAddImageFromModal = createPopper(buttonAddImageFromModal, buttonAddImageFromModalTooltip, {
    placements: "right",
    modifiers: [
        {
            name: 'offset',
            options: {
            offset: [0, 8],
            },
        },
    ],
});


const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];

showEvents.forEach((event) => {
    editLokasi.addEventListener(event, () => {
        editLokasiKostToolTip.setAttribute("data-show", "");
        popperEditLokasi.update();
    });

    editGambarKost.addEventListener(event, () => {
        editGambarKostTooltip.setAttribute("data-show", "");
        popperEditGambarKost.update();
    });

    editFasilitas.addEventListener(event, () => {
        editFasiltasTooltip.setAttribute("data-show", "");
        popperFasilitas.udpate();
    });

    buttonAddImageFromModal.addEventListener(event, () => {
        buttonAddImageFromModalTooltip.setAttribute("data-show", "");
        popperButtonAddImageFromModal.update();
    })
});

hideEvents.forEach((event) => {
    editLokasi.addEventListener(event, () => {
        editLokasiKostToolTip.removeAttribute("data-show");
        popperEditLokasi.update();
    });

    editGambarKost.addEventListener(event, () => {
        editGambarKostTooltip.removeAttribute("data-show");
        popperEditGambarKost.update();
    });

    editFasilitas.addEventListener(event, () => {
        editFasiltasTooltip.removeAttribute("data-show");
        popperFasilitas.update();
    });

    buttonAddImageFromModal.addEventListener(event, () => {
        buttonAddImageFromModalTooltip.removeAttribute("data-show");
        popperButtonAddImageFromModal.update();
    })
})


