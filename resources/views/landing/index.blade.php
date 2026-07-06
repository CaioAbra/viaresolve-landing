@extends('layouts.app')

@section('title', 'ViaResolve — Recupere sua liberdade no trânsito')

@section('content')

{{-- NAVBAR --}}
<header class="navbar" id="navbar">
    <div class="navbar__container">
        <a href="{{ route('landing') }}" class="navbar__logo">
            <span class="navbar__logo-icon">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <circle cx="14" cy="14" r="14" fill="#2563EB"/>
                    <path d="M8 14l4 4 8-8" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span class="navbar__logo-text">Via<strong>Resolve</strong></span>
        </a>

        <nav class="navbar__nav" id="navbar-nav">
            <a href="#solucoes" class="navbar__link">Soluções</a>
            <a href="#cnh-cassada" class="navbar__link">CNH cassada</a>
            <a href="#depoimentos" class="navbar__link">Depoimentos</a>
            <a href="#quem-somos" class="navbar__link">Sobre nós</a>
        </nav>

        <a href="#contato" class="btn btn--primary navbar__cta">Entrar em contato</a>

        <button class="navbar__toggle" id="navbar-toggle" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

{{-- HERO --}}
<section class="hero" id="inicio">
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <div class="hero__badge" data-aos="fade-down">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><circle cx="7" cy="7" r="7" fill="#2563EB"/><path d="M4 7l2 2 4-4" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            ViaResolve — Assessoria de Trânsito
        </div>
        <h1 class="hero__title" data-aos="fade-up" data-aos-delay="100">
            Recupere sua liberdade<br>
            <span class="hero__title-highlight">no trânsito</span> e liberte-se<br>
            das preocupações
        </h1>
        <p class="hero__subtitle" data-aos="fade-up" data-aos-delay="200">
            Especialistas em recursos de multas. Sua CNH está<br>
            com problemas? <strong>ViaResolve resolve.</strong>
        </p>
        <div class="hero__actions" data-aos="fade-up" data-aos-delay="300">
            <a href="#contato" class="btn btn--primary btn--lg">
                Resolver agora
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="#contato" class="btn btn--ghost btn--lg">Entrar em contato</a>
        </div>
    </div>
    <div class="hero__scroll" id="hero-scroll">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M5 8l5 5 5-5" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
</section>

{{-- STATS --}}
<section class="stats" id="resultados">
    <div class="container">
        <p class="section-label section-label--center" data-aos="fade-up">
            Confira nossos resultados
            <span class="section-label__icon">👇</span>
        </p>
        <div class="stats__grid">
            @foreach([
                ['+10.000', 'Casos resolvidos',  10000, '+', '',  'milhar'],
                ['99%',     'De satisfação',     99,    '',  '%', ''     ],
                ['+5.000',  'Recursos de multas', 5000, '+', '',  'milhar'],
                ['+500',    'Recursos de CNH',    500,  '+', '',  ''     ],
            ] as $i => [$num, $label, $val, $prefix, $suffix, $format])
            <div class="stats__card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="stats__icon">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M4 9l3.5 3.5L14 6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="stats__info">
                    <span
                        class="stats__number js-countup"
                        data-value="{{ $val }}"
                        data-prefix="{{ $prefix }}"
                        data-suffix="{{ $suffix }}"
                        data-format="{{ $format }}"
                        data-duration="1800"
                        aria-label="{{ $num }}"
                    >{{ $num }}</span>
                    <span class="stats__label">{{ $label }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SOLUÇÕES --}}
<section class="solutions" id="solucoes">
    <div class="container">
        <p class="section-label section-label--center" data-aos="fade-up">Nossas soluções</p>
        <h2 class="section-title section-title--center" data-aos="fade-up" data-aos-delay="80">
            Sua CNH está com problema?<br>
            <span class="text-primary">ViaResolve resolve.</span>
        </h2>

        <div class="solutions__grid">
            @foreach([
                [
                    'title' => 'CNH cassada ou bloqueada',
                    'desc'  => 'Não dirija assim. Com a CNH regularizada, você tem a tranquilidade para dirigir sem preocupações.',
                    'icon'  => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                ],
                [
                    'title' => 'Recurso de multa de trânsito',
                    'desc'  => 'Existem inúmeras formas de defesa e recurso de multas de trânsito. Vamos resolver esse problema.',
                    'icon'  => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
                ],
                [
                    'title' => 'Recurso de multa ANTT',
                    'desc'  => 'Muitos desconhecem que essas multas podem ser recorridas via processo administrativo. Podemos ajudar.',
                    'icon'  => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                ],
                [
                    'title' => 'Parcelamento IPVA',
                    'desc'  => 'Parcele o seu IPVA em até 12 vezes no cartão e rode tranquilo sem preocupações com pendências.',
                    'icon'  => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
                ],
            ] as $i => $service)
            <div class="solutions__card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="solutions__card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="{{ $service['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="solutions__card-title">{{ $service['title'] }}</h3>
                <p class="solutions__card-desc">{{ $service['desc'] }}</p>
                <a href="#contato" class="btn btn--primary btn--sm">
                    Resolver agora
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2.5 7h9M8 3.5l3.5 3.5L8 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- QUEM SOMOS --}}
<section class="about" id="quem-somos">
    <div class="container">
        <div class="about__grid">
            <div class="about__left" data-aos="fade-right">
                <p class="section-label">Quem somos</p>
                <h2 class="section-title">
                    Com mais de 7 anos de experiência, atuamos em
                    <span class="text-primary">todo o território brasileiro</span>
                </h2>
                <div class="about__benefits">
                    <div class="about__benefit">
                        <div class="about__benefit-icon about__benefit-icon--yellow">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 2l1.8 3.6L14 6.3l-3 2.9.7 4.1L8 11.2l-3.7 2 .7-4.1-3-2.9 4.2-.7L8 2z" fill="currentColor"/></svg>
                        </div>
                        <div>
                            <strong>Direito de dirigir</strong>
                            <p>Recupere o seu direito de dirigir. Atuamos em todas as etapas do processo.</p>
                        </div>
                    </div>
                    <div class="about__benefit">
                        <div class="about__benefit-icon about__benefit-icon--blue">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM5.5 8.5L7 10l3.5-3.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <strong>Seguro DPVAT</strong>
                            <p>Receba os benefícios do seu DPVAT de forma ágil e segura.</p>
                        </div>
                    </div>
                </div>
                <div class="about__cta">
                    <a href="#contato" class="btn btn--primary">Entrar em contato</a>
                </div>
            </div>
            <div class="about__right" data-aos="fade-left" data-aos-delay="150">
                <p>
                    Com mais de 7 anos de experiência, mais de 5.000 recursos de multas
                    e mais de 500 recursos de CNH suspensos, somos especialistas no assunto.
                </p>
                <p>
                    Se você precisa recorrer de uma multa de trânsito, de sua carteira cassada
                    ou entrar com pedido de seguro DPVAT, nossa equipe altamente qualificada
                    pode lhe ajudar em todas as etapas, cuidando de tudo para você com muita
                    experiência e rapidez.
                </p>
                <div class="about__numbers">
                    <div class="about__number-item">
                        <span class="about__number-value js-countup" data-value="7" data-prefix="" data-suffix="+" data-duration="1200" aria-label="7+">0</span>
                        <span class="about__number-label">Anos de experiência</span>
                    </div>
                    <div class="about__number-item">
                        <span class="about__number-value js-countup" data-value="5" data-prefix="" data-suffix="k+" data-duration="1400" aria-label="5k+">0</span>
                        <span class="about__number-label">Recursos de multas</span>
                    </div>
                    <div class="about__number-item">
                        <span class="about__number-value js-countup" data-value="99" data-prefix="" data-suffix="%" data-duration="1600" aria-label="99%">0</span>
                        <span class="about__number-label">Satisfação</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TICKER --}}
<div class="ticker" aria-hidden="true">
    <div class="ticker__track">
        @for($t = 0; $t < 3; $t++)
        <span class="ticker__item">✦ VIARESOLVE</span>
        <span class="ticker__item">✦ ASSESSORIA DE TRÂNSITO</span>
        <span class="ticker__item">✦ ESPECIALISTAS EM RECURSOS DE MULTAS</span>
        <span class="ticker__item">✦ VIARESOLVE</span>
        <span class="ticker__item">✦ CNH CASSADA RESOLVIDA</span>
        <span class="ticker__item">✦ DPVAT E IPVA</span>
        @endfor
    </div>
</div>

{{-- CNH CASSADA --}}
<section class="problem" id="cnh-cassada">
    <div class="container">
        <div class="problem__grid">
            <div class="problem__content" data-aos="fade-right">
                <p class="section-label">Problemas resolvidos</p>
                <h2 class="section-title">
                    Sua CNH está cassada<br>ou bloqueada?
                </h2>
                <p class="problem__desc">
                    Somos especialistas em recursos de multas de trânsito. Sabemos da
                    necessidade de dirigir sem preocupações e por isso estamos aqui,
                    para cuidar e defender o seu direito de dirigir.
                </p>
                <div class="problem__benefits">
                    <div class="problem__benefit">
                        <div class="problem__benefit-icon">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M4 9l3 3 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <div>
                            <strong>Não fique sem dirigir</strong>
                            <p>Você tem o direito de recorrer; vamos te devolver o direito de dirigir antes do que você imagina.</p>
                        </div>
                    </div>
                    <div class="problem__benefit">
                        <div class="problem__benefit-icon">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 2l1.5 3 3.3.5-2.4 2.3.6 3.2L9 9.5 6 11l.6-3.2L4.2 5.5l3.3-.5L9 2z" fill="currentColor"/></svg>
                        </div>
                        <div>
                            <strong>Não fique sem trabalhar</strong>
                            <p>Seu trabalho não pode parar. Tornamos o processo rápido, prático e você voltará a dirigir em breve.</p>
                        </div>
                    </div>
                </div>
                <div class="problem__actions">
                    <a href="#contato" class="btn btn--primary">Resolver agora</a>
                    <a href="#contato" class="btn btn--ghost-dark">Entrar em contato</a>
                </div>
            </div>
            <div class="problem__visual" data-aos="fade-left" data-aos-delay="150">
                <div class="problem__visual-inner">
                    <div class="problem__visual-decor problem__visual-decor--1"></div>
                    <div class="problem__visual-decor problem__visual-decor--2"></div>
                    <div class="problem__visual-card">
                        <div class="problem__visual-icon">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <circle cx="24" cy="24" r="24" fill="#2563EB" fill-opacity="0.12"/>
                                <path d="M16 24l5.5 5.5L32 18" stroke="#2563EB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <p class="problem__visual-text">CNH regularizada<br><strong>em até 60 dias</strong></p>
                    </div>
                    <div class="problem__visual-badge">
                        <span>+500 CNHs</span> recuperadas
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DEPOIMENTOS --}}
<section class="testimonials" id="depoimentos">
    <div class="container">
        <div class="testimonials__header">
            <div class="testimonials__header-left" data-aos="fade-right">
                <p class="section-label">Clientes</p>
                <h2 class="section-title">
                    O que estão falando sobre<br>
                    a <span class="text-primary">ViaResolve?</span>
                </h2>
                <p class="testimonials__subtitle">
                    Veja o que dizem nossos clientes sobre as soluções encontradas,
                    atendimento e conclusão dos recursos.
                </p>
            </div>
        </div>
        <div class="testimonials__grid">
            @foreach([
                [
                    'text'   => 'Estava com recurso de pontos na minha habilitação. A ViaResolve me ajudou muito, mais rápido do que eu esperava. Atendimento impecável e resultado positivo!',
                    'name'   => 'Mariana G. Andrade',
                    'role'   => 'Cliente desde 2024',
                    'initials'=> 'MA',
                ],
                [
                    'text'   => 'Sou pai de família e estava com minha CNH cassada. Contactei a ViaResolve e de forma rápida resolverem minha situação. Muitíssimo obrigado, podem confiar!',
                    'name'   => 'João P. Soares',
                    'role'   => 'Cliente desde 2023',
                    'initials'=> 'JS',
                ],
                [
                    'text'   => 'Fui com muita confiança na ViaResolve. Eles são concretos no que fazem — resolveram minha multa ANTT que eu achava impossível de recorrer. Recomendo muito!',
                    'name'   => 'Valéria Santos',
                    'role'   => 'Cliente desde 2025',
                    'initials'=> 'VS',
                ],
            ] as $i => $t)
            <div class="testimonials__card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="testimonials__stars">
                    @for($s = 0; $s < 5; $s++)
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="#F59E0B"><path d="M7 1l1.5 3 3.3.5-2.4 2.3.6 3.2L7 8.5 4 10l.6-3.2L2.2 4.5l3.3-.5L7 1z"/></svg>
                    @endfor
                </div>
                <p class="testimonials__text">"{{ $t['text'] }}"</p>
                <div class="testimonials__author">
                    <div class="testimonials__avatar">{{ $t['initials'] }}</div>
                    <div>
                        <strong>{{ $t['name'] }}</strong>
                        <span>{{ $t['role'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FORMULÁRIO --}}
<section class="contact" id="contato">
    <div class="container">
        <div class="contact__grid">
            <div class="contact__left" data-aos="fade-right">
                <p class="section-label section-label--light">Contato</p>
                <h2 class="contact__title">
                    Preencha os dados no formulário e entraremos
                    <span>em contato com você</span>
                </h2>
                <p class="contact__subtitle">Analisamos com detalhe cada situação.</p>
                <a href="#contato" class="btn btn--outline-white btn--lg">
                    Resolver agora
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>

            <div class="contact__right" data-aos="fade-left" data-aos-delay="150">
                @if(session('success'))
                <div class="contact__success">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="10" fill="#10B981"/><path d="M6 10l3 3 5-5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                <form class="contact__form" action="{{ route('lead.submit') }}" method="POST" id="contact-form">
                    @csrf
                    <div class="form-group @error('name') has-error @enderror">
                        <input
                            type="text"
                            name="name"
                            class="form-input"
                            placeholder="Seu nome"
                            value="{{ old('name') }}"
                            autocomplete="name"
                        >
                        @error('name')<span class="form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <input
                            type="email"
                            name="email"
                            class="form-input"
                            placeholder="Seu melhor e-mail"
                            value="{{ old('email') }}"
                            autocomplete="email"
                        >
                        @error('email')<span class="form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group @error('phone') has-error @enderror">
                        <input
                            type="tel"
                            name="phone"
                            class="form-input"
                            placeholder="Telefone (com DDD)"
                            value="{{ old('phone') }}"
                            autocomplete="tel"
                            id="phone-input"
                        >
                        @error('phone')<span class="form-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group @error('problem') has-error @enderror">
                        <textarea
                            name="problem"
                            class="form-input form-textarea"
                            placeholder="Nos fale sobre seu problema..."
                            rows="4"
                        >{{ old('problem') }}</textarea>
                        @error('problem')<span class="form-error">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn--primary btn--full btn--lg" id="submit-btn">
                        <span class="btn__text">Resolver agora</span>
                        <span class="btn__loading" style="display:none">Enviando...</span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <div class="contact__security">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M7 1L2 3.5v4C2 10.5 4.5 13 7 13s5-2.5 5-5.5v-4L7 1z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><path d="M4.5 7l2 2 3-3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Seus dados estão seguros
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="footer">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__brand">
                <a href="{{ route('landing') }}" class="navbar__logo">
                    <span class="navbar__logo-icon">
                        <svg width="24" height="24" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="14" fill="#2563EB"/><path d="M8 14l4 4 8-8" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="navbar__logo-text">Via<strong>Resolve</strong></span>
                </a>
                <p>Especialistas em recursos de multas e<br>assessoria de trânsito em todo o Brasil.</p>
            </div>
            <div class="footer__contact">
                <div class="footer__contact-item">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 3.5h10l-5 5-5-5zM2 3.5v7h10v-7" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    contato@viaresolve.com.br
                </div>
                <div class="footer__contact-item">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M5.5 2.5L4 4.5C5 6.5 7.5 9 9.5 10l2-1.5-3-2-3 1z" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    (11) 99999-0000
                </div>
                <div class="footer__contact-item">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M7 1C4.8 1 3 2.8 3 5c0 3 4 8 4 8s4-5 4-8c0-2.2-1.8-4-4-4zm0 5.5A1.5 1.5 0 117 3a1.5 1.5 0 010 3.5z" fill="currentColor"/></svg>
                    São Paulo — SP, Brasil
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <span>© {{ date('Y') }} ViaResolve. Todos os direitos reservados.</span>
            <button class="footer__totop" id="back-to-top" aria-label="Voltar ao topo">
                Voltar ao topo
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 9l4-4 4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
        </div>
    </div>
</footer>

@endsection
