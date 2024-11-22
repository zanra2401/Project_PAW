import { createPopper } from '/project_paw/node_modules/@popperjs/core/lib/index.js';
// Inisialisasi peta
const map = L.map('map').setView([0.5, 30.5], 5); // Jakarta

const markerLayer = L.layerGroup().addTo(map);

// Tambahkan tile OSM
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '© OpenStreetMap contributors'
}).addTo(map);

L.marker([0.5, 30.5]).addTo(markerLayer);

map.on('click', function (ev) {
    markerLayer.clearLayers();
    L.marker(ev.latlng).addTo(markerLayer);
})



// POPPER JS

const editLokasi = document.getElementById("edit-lokasi");
const editLokasiKostToolTip = document.getElementById("edit-lokasi-kost-tooltip");
const editGambarKost = document.getElementById("edit-gambar-kost");
const editGambarKostTooltip = document.getElementById("edit-gambar-kost-tooltip");
const editFasilitas = document.getElementById("edit-fasilitas");
const editFasiltasTooltip = document.getElementById("edit-fasilitas-tooltip");

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
    placements: "left",
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
});

hideEvents.forEach((event) => {
    editLokasi.addEventListener(event, () => {
        editLokasiKostToolTip.removeAttribute("data-show");
        popperEditLokasi.update();
    });

    editGambarKost.addEventListener(event, () => {
        editGambarKostTooltip.removeAttribute("data-show", "");
        popperEditGambarKost.update();
    });

    editFasilitas.addEventListener(event, () => {
        editFasiltasTooltip.removeAttribute("data-show", "");
        popperFasilitas.update();
    });
})


