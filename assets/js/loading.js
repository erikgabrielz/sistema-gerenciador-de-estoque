if (window.location.href == `${BASE_URL}/` || window.location.href == `${BASE_URL}/home`) {
    const dotsElement = document.getElementById('loading');
    let dots = '';

    setInterval(() => {
        dots = dots.length < 3 ? dots + '.' : '';
        dotsElement.textContent = dots;
    }, 200);
}