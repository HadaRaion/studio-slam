import gsap from 'gsap';

const animationEnter = container => {
	const page = container.querySelector('.page-body');
	const headerText = container.querySelectorAll('.page-header > h2 > .letter');
	const tl = gsap.timeline();

	tl.to(page, { autoAlpha: 1, duration: 2 });
	tl.from(headerText, { yPercent: 100, duration: 0.5, stagger: 0.1, clearProps: 'all' }, '-=1.5');

	return tl;
};

export default animationEnter;
