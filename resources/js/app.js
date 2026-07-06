// ViaResolve — app.js

// --- Navbar scroll ---
const navbar = document.getElementById('navbar');
if (navbar) {
    const onScroll = () => navbar.classList.toggle('is-scrolled', window.scrollY > 40);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

// --- Mobile menu toggle ---
const toggle = document.getElementById('navbar-toggle');
const nav    = document.getElementById('navbar-nav');
if (toggle && nav) {
    toggle.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        toggle.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', open);
    });
    nav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            toggle.classList.remove('is-open');
        });
    });
}

// --- Smooth scroll ---
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
        const target = document.querySelector(anchor.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        const top = target.getBoundingClientRect().top + window.scrollY - 80;
        window.scrollTo({ top, behavior: 'smooth' });
    });
});

// --- Back to top ---
const backToTop = document.getElementById('back-to-top');
if (backToTop) {
    backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

// --- Hero scroll arrow ---
const heroScroll = document.getElementById('hero-scroll');
if (heroScroll) {
    heroScroll.addEventListener('click', () => {
        const next = document.getElementById('resultados');
        if (next) next.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}

// --- AOS via IntersectionObserver ---
function initAOS() {
    const elements = document.querySelectorAll('[data-aos]');
    if (!elements.length) return;
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    elements.forEach(el => observer.observe(el));
}
initAOS();

// --- Mascara de telefone ---
const phoneInput = document.getElementById('phone-input');
if (phoneInput) {
    phoneInput.addEventListener('input', (e) => {
        let v = e.target.value.replace(/\D/g, '').slice(0, 11);
        if      (v.length > 10) v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        else if (v.length > 6)  v = v.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
        else if (v.length > 2)  v = v.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
        else if (v.length > 0)  v = v.replace(/^(\d{0,2})$/, '($1');
        e.target.value = v;
    });
}

// --- Submit loading state ---
const contactForm = document.getElementById('contact-form');
const submitBtn   = document.getElementById('submit-btn');
if (contactForm && submitBtn) {
    contactForm.addEventListener('submit', () => {
        const text    = submitBtn.querySelector('.btn__text');
        const loading = submitBtn.querySelector('.btn__loading');
        if (text && loading) { text.style.display = 'none'; loading.style.display = 'inline'; }
        submitBtn.disabled = true;
    });
}

// --- Count-up animation ---
//
// data-value    -> numero alvo (inteiro)
// data-prefix   -> prefixo literal, ex: "+"
// data-suffix   -> sufixo literal, ex: "%" ou "k+"  (NAO use para milhar)
// data-format   -> "milhar" aplica toLocaleString('pt-BR'); vazio = numero puro
// data-duration -> ms da animacao
//
// O valor inicial no HTML deve ser o valor final (ex: "+10.000") para nao haver
// salto de layout antes do JS carregar — o JS sobrescreve para "0" ao iniciar.
//

function easeOutExpo(t) {
    return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
}

function runCountup(el) {
    if (el.dataset.counted) return;
    el.dataset.counted = '1';

    const target   = parseFloat(el.dataset.value);
    const prefix   = el.dataset.prefix  || '';
    const suffix   = el.dataset.suffix  || '';
    const isMilhar = el.dataset.format  === 'milhar';
    const duration = parseInt(el.dataset.duration) || 1600;

    // Formata o valor intermediario
    const format = (val) => {
        const n = Math.floor(val);
        return prefix + (isMilhar ? n.toLocaleString('pt-BR') : String(n)) + suffix;
    };

    // Inicia do zero
    el.textContent = prefix + '0' + suffix;

    const start = performance.now();

    const tick = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const eased    = easeOutExpo(progress);

        el.textContent = format(eased * target);

        if (progress < 1) {
            requestAnimationFrame(tick);
        } else {
            // Valor final exato — usa aria-label como fonte da verdade
            el.textContent = el.getAttribute('aria-label') || format(target);
        }
    };

    requestAnimationFrame(tick);
}

function initCountup() {
    const items = document.querySelectorAll('.js-countup');
    if (!items.length) return;

    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            // Respeita o delay AOS do card pai
            const cardDelay = parseInt(
                entry.target.closest('[data-aos-delay]')?.dataset.aosDelay ?? 0
            );
            setTimeout(() => runCountup(entry.target), cardDelay);
            io.unobserve(entry.target);
        });
    }, { threshold: 0.4 });

    items.forEach(el => io.observe(el));
}
initCountup();

// --- Ticker clone (loop continuo) ---
const ticker = document.querySelector('.ticker__track');
if (ticker) {
    const clone = ticker.cloneNode(true);
    ticker.parentElement.appendChild(clone);
}
