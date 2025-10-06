import gsap from 'gsap';

const mobileMenuOn = () => {
	const menu = document.querySelector('.menu');
	const mainContainer = document.querySelector('main');
	const header = document.querySelector('header');
	const blackFilter = document.querySelector('.black-filter');
	const menuOverlay = document.querySelector('.menu__overlay');
	const menuLists = document.querySelectorAll('.menu__list li');

	menu.classList.add('active');
	mainContainer.classList.add('blur');
	header.classList.add('blur');
	blackFilter.classList.add('active');
	menuOverlay.classList.add('active');

	gsap.to(menuLists, { autoAlpha: 1, duration: 1, y: 10, stagger: 0.2, ease: 'power3.out', delay: 0.5 });
};

export default mobileMenuOn;
