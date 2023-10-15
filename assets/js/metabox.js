const initAirySeoMetabox = () => {
    if (!document.querySelector('#airyseo-metabox')) {
      return;
    }
  
    const titleChars = 60;
    const titlePixels = 600;
    const descriptionChars = 160;
    const descriptionPixels = 920;
  
    const getTextWidth = (text, font) => {
      let canvas = document.createElement('canvas');
      let context = canvas.getContext('2d');
      context.font = font;
      let metrics = context.measureText(text);
      return metrics.width;
    }
  
    const title = document.querySelector('#airyseo-title');
    const description = document.querySelector('#airyseo-description');
    const titleCharCounter = document.querySelector('.seo-status__title--current');
    const titleDescriptionCounter = document.querySelector('.seo-status__description--current');
  
    title.addEventListener('keyup', () => {
      const pixels = getTextWidth(title.value, '20px Arial');
      titleCharCounter.innerHTML = title.value.length;
  
      if (title.value.length > titleChars || pixels > titlePixels) {
        titleCharCounter.setAttribute('style', 'color: red');
      } else if (titleCharCounter.hasAttribute('style')) {
        titleCharCounter.removeAttribute('style');
      }
    });
  
    description.addEventListener('keyup', () => {
      const pixels = getTextWidth(description.value, '16px Arial');
      titleDescriptionCounter.innerHTML = description.value.length;
  
      if (description.value.length > descriptionChars || pixels > descriptionPixels) {
        titleDescriptionCounter.setAttribute('style', 'color: red');
      } else if (titleDescriptionCounter.hasAttribute('style')) {
        titleDescriptionCounter.removeAttribute('style');
      }
    });
  };
  
  initAirySeoMetabox();