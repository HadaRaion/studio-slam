const englishMode = document.querySelector('.lang-item-en');
const koreanMode = document.querySelector('.lang-item-ko');

englishMode.addEventListener('click', () => {
	let baseUrl = window.location.origin;
	window.location.replace(`${baseUrl}/en/`);
});

koreanMode.addEventListener('click', () => {
	let baseUrl = window.location.origin;
	window.location.replace(baseUrl);
});
