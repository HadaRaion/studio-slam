import Splide from '@splidejs/splide';

const initHistorySlide = () => {
	const historySlider = document.getElementById('history-slider');
	
	if (!historySlider) {
		return;
	}

	new Splide('#history-slider', {
		type: 'slide',
		perPage: 3,
		// perMove: 1,
		gap: '4rem',
		pagination: false,
		arrows: true,
		keyboard: true,
		breakpoints: {
			1024: {
				perPage: 2,
				gap: '4rem',
			},
			640: {
				perPage: 1,
				gap: '1rem',
			}
		}
	}).mount();
};

export default initHistorySlide;
