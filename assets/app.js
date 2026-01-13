import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

function initBurgerMenu() {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.main-nav');

    if (!burger || !nav) {
        return;
    }

    // Évite d'ajouter plusieurs fois le même listener
    if (burger.dataset.listenerAttached === 'true') {
        return;
    }

    burger.addEventListener('click', () => {
        const isOpen = burger.classList.toggle('is-open');
        nav.classList.toggle('is-open', isOpen);
        burger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        document.body.classList.toggle('nav-open', isOpen);
    });

    burger.dataset.listenerAttached = 'true';
}

document.addEventListener('DOMContentLoaded', initBurgerMenu);
document.addEventListener('turbo:load', initBurgerMenu);
