import gsap from 'gsap';

const mobileMenuOff = () => {
	const menu = document.querySelector('.menu');
	const mainContainer = document.querySelector('main');
	const header = document.querySelector('header');
	const blackFilter = document.querySelector('.black-filter');
	const menuOverlay = document.querySelector('.menu__overlay');
	const menuLists = document.querySelectorAll('.menu__list li');

	menu.classList.remove('active');
	mainContainer.classList.remove('blur');
	header.classList.remove('blur');
	blackFilter.classList.remove('active');
	menuOverlay.classList.remove('active');

	gsap.to(menuLists, { autoAlpha: 0, duration: 0.5, ease: 'power3.out', clearProps: 'all' });
};

export default mobileMenuOff;
