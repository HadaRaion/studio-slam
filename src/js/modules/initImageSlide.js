import Splide from '@splidejs/splide';

const initImageSlide = () => {
	new Splide('#image-slider', {
		rewind: true,
	}).mount();
};

export default initImageSlide;
