import gsap from 'gsap';

const mobileMenuOff = () => {
	const menu = document.querySelector('.menu');
	const mainContainer = document.querySelector('main');
	const header = document.querySelector('header');
	const blackFilter = document.querySelector('.black-filter');
	const menuOverlay = document.querySelector('.menu__overlay');

	menu.classList.remove('active');
	mainContainer.classList.remove('blur');
	header.classList.remove('blur');
	blackFilter.classList.remove('active');
	menuOverlay.classList.remove('active');
};

const mobileMenuOn = () => {
	const menu = document.querySelector('.menu');
	const mainContainer = document.querySelector('main');
	const header = document.querySelector('header');
	const blackFilter = document.querySelector('.black-filter');
	const menuOverlay = document.querySelector('.menu__overlay');

	menu.classList.add('active');
	mainContainer.classList.add('blur');
	header.classList.add('blur');
	blackFilter.classList.add('active');
	menuOverlay.classList.add('active');
};

const menuLists = document.querySelectorAll('.menu__list li');
const tl = gsap.timeline();

tl.set(menuLists, { autoAlpha: 0, y: 0 });
tl.to(menuLists, { autoAlpha: 1, duration: 1, y: 10, stagger: 0.2, ease: 'power3.out', delay: 0.3 });

tl.pause();

const menuButton = document.querySelector('.menu-btn');
const btnContainer = document.querySelector('.menu-btn-container');

menuButton.addEventListener('click', e => {
	btnContainer.classList.toggle('open');
	e.preventDefault();
	if (btnContainer.classList.contains('open')) {
		mobileMenuOn();
		tl.restart();
	} else {
		tl.timeScale(2.5).reverse();
		setTimeout(mobileMenuOff, 700);
	}
});
