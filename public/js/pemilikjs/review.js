import { createPopper } from '/project_paw/node_modules/@popperjs/core/lib/index.js';

const lihatSemuaGambarButton = document.getElementById("lihat-semua-gambar-button");
const lihatSemuaGambarTooltip = document.getElementById("lihat-semua-gambar-tooltip");
const gambarKos2 = document.getElementById("gambar-kos2");
const previewGambarKos2 = document.getElementById("preview-gambar-kos2");

const popperInstance =  createPopper(lihatSemuaGambarButton, lihatSemuaGambarTooltip, {
    placements: 'right',
    modifiers: [
        {
          name: 'offset',
          options: {
            offset: [0, 8],
          },
        },
      ],
});

const popperInstance2 = createPopper(gambarKos2, previewGambarKos2, {
    placements: 'right',
    modifiers: [
        {
          name: 'offset',
          options: {
            offset: [0, 8],
          },
        },
      ],
});

function show(tooltip, popperInstance) {
    tooltip.setAttribute('data-show', '');

  
    // We need to tell Popper to update the tooltip position
    // after we show the tooltip, otherwise it will be incorrect
    popperInstance.update();
}
  
function hide() {
    tooltip.removeAttribute('data-show');
}
  
const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];
  
showEvents.forEach((event) => {
    lihatSemuaGambarButton.addEventListener(event, ( ) => {
        lihatSemuaGambarTooltip.setAttribute('data-show', '');
        popperInstance.update()   
    });

    gambarKos2.addEventListener(event, ( ) => {
        previewGambarKos2.setAttribute('data-show', '');
        popperInstance2.update()
    });

});
  
hideEvents.forEach((event) => {
    lihatSemuaGambarButton.addEventListener(event, ( ) => {
        lihatSemuaGambarTooltip.removeAttribute('data-show');
    });


    gambarKos2.addEventListener(event, () => {
        previewGambarKos2.removeAttribute('data-show');
    });
});