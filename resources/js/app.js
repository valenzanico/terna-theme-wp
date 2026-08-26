document.addEventListener('DOMContentLoaded', () => {
  
  const menuButton = document.querySelector('.menu');
  const menuIcon = document.querySelector('.menu-icon');
  const dropdownMenu = document.querySelector('.dropdown-menu');

  if (!menuButton || !menuIcon || !dropdownMenu) {
    return;
  }

  let isOpen = false;

  menuButton.addEventListener('click', () => {
    
    isOpen = !isOpen;
    dropdownMenu.classList.toggle('open', isOpen);
    menuIcon.classList.toggle('rotate-90', isOpen);
    menuIcon.classList.toggle('rotate-0', !isOpen);
  });
});

import '../css/app.css';
import '../css/news-header.css';
