import gsap from 'gsap';

const animationLeave = container => {
	const page = container.querySelector('.page-body');
	const headerText = container.querySelectorAll('.page-header > h2 > .letter');

	var tl = gsap.timeline();

	tl.to(page, { autoAlpha: 0 }, 0);
	tl.to(headerText, { autoAlpha: 0 }, 0);
	return tl;
};

export default animationLeave;
