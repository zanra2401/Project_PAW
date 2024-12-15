import { createPopper } from '/project_paw/node_modules/@popperjs/core/lib/index.js';

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


