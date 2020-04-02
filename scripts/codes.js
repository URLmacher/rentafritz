document.addEventListener('DOMContentLoaded', () => {
  const sideNavsDom = document.querySelectorAll('.sidenav');
  M.Sidenav.init(sideNavsDom, { edge: 'right' });

  const zitateContainerDom = document.querySelector('.zitate');
  const zitateDom = document.querySelectorAll('.zitate__zitat-wrapper');
  let zitateInterval;
  let zitatIndex = 0;

  function startInterval() {
    zitateInterval = setInterval(() => {
      let next = zitatIndex + 1;
      zitateDom[zitatIndex].classList.add('zitate__hidden');
      if (next > zitateDom.length - 1) {
        next = 0;
      }
      if (zitatIndex + 1 > zitateDom.length - 1) {
        zitatIndex = 0;
      } else {
        zitatIndex++;
      }
      zitateDom[next].classList.remove('zitate__hidden');
    }, 3000);
  }

  function pauseInterval() {
    clearInterval(zitateInterval);
  }

  zitateContainerDom.addEventListener('mouseenter', pauseInterval);
  zitateContainerDom.addEventListener('mouseleave', startInterval);
  startInterval();
});
