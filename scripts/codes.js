document.addEventListener('DOMContentLoaded', () => {
  //navigation
  const sideNavsDom = document.querySelectorAll('.sidenav');
  const menuBtnDomOpen = document.getElementById('navbar-menu-btn-open');
  const menuBtnDomClose = document.getElementById('navbar-menu-btn-close');
  const sideNavInstances = M.Sidenav.init(sideNavsDom, { edge: 'right' });

  menuBtnDomOpen.addEventListener('click', () => {
    menuBtnDomOpen.classList.add('hide');
    menuBtnDomClose.classList.remove('hide');
  });

  menuBtnDomClose.addEventListener('click', () => {
    menuBtnDomOpen.classList.remove('hide');
    menuBtnDomClose.classList.add('hide');
    sideNavInstances.forEach((sideNav) => {
      if (sideNav.isOpen) {
        sideNav.close();
      }
    });
  });

  //Header-title
  const headerTitleDom = document.getElementById('renta-header-title');
  if (headerTitleDom) {
    window.fitText(headerTitleDom, 1.8);
  }

  //Zitate
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
    }, 5000);
  }

  function pauseInterval() {
    clearInterval(zitateInterval);
  }

  if (zitateContainerDom) {
    zitateContainerDom.addEventListener('mouseenter', pauseInterval);
    zitateContainerDom.addEventListener('mouseleave', startInterval);
    startInterval();
  }
});
