import { createPopper } from '/project_paw/node_modules/@popperjs/core/lib/index.js';

const lihatSemuaGambarButton = document.getElementById("lihat-semua-gambar-button");
const lihatSemuaGambarTooltip = document.getElementById("lihat-semua-gambar-tooltip");

const popperInstance = createPopper(lihatSemuaGambarButton, lihatSemuaGambarTooltip, {
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

function show() {
    lihatSemuaGambarTooltip.setAttribute('data-show', '');
  
    // We need to tell Popper to update the tooltip position
    // after we show the tooltip, otherwise it will be incorrect
    popperInstance.update();
}
  
function hide() {
    lihatSemuaGambarTooltip.removeAttribute('data-show');
}
  
const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];
  
showEvents.forEach((event) => {
    lihatSemuaGambarButton.addEventListener(event, show);
});
  
hideEvents.forEach((event) => {
    lihatSemuaGambarButton.addEventListener(event, hide);
});