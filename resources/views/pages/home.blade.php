@extends('base.layout')

@section('title', 'Home')

@push('styles')
    @vite(['resources/css/home.css'])
@endpush

@section('content')
    <section class="section-inicial">
        <div class="conectar">
            <span><img src="{{ asset('img/foguete_branco.svg') }}" alt="" class="foguete-section">CONECTE-SE ÀS MELHORES
                OPORTUNIDADES PERTO DE
                VOCÊ</span>
        </div>
        <div class="futuro">
            <span class="seu-futuro">Seu futuro</span>
            <span class="comeca">começa aqui</span>
        </div>

        <span class="span-texto">Conectamos talentos às melhores oportunidades de emprego, capacitação profissional e
            desenvolvimento
            social.</span>
        <div class="btn-home">
            <a href="#" class="btn-vagas"> <img src=" {{asset('img/work-alt-white.svg')}}" alt=""
                    class="work-white"><span>Explorar vagas</span></a>
            {{-- LEMBRAR DOS LINKS KKKKK --}}
            <a href="#" class="btn-cursos"><img src="{{asset('img/book-open-white.svg')}}" alt="" class="book-white">Ver
                Cursos</a>
        </div>
    </section>

    <section class="search">
        <div class="search-box">
            <input class="search-txt" type="text" name="" placeholder="Explore vagas, capacitações e projetos sociais...">
            <a href="#" class="search-button">
                <img src="{{ asset('img/magnifying-glass-svgrepo-com.svg') }}" alt="Pesquisar">
                <i class="fas fa-search"></i>
            </a>
        </div>
    </section>
    <section class="container-oportunidades">
        <div class="card">
            <img src="{{asset('img/vagas-de-emprego.svg')}}" alt="">
            <h2>Vagas</h2>
            <span>Ver todos</span>
            <a href="#" class="link-estendido"></a>
        </div>

        <div class="card">
            <img src="{{asset('img/cursos-profissionais.svg')}}" alt="">
            <h2>Cursos</h2>
            <span>Ver todos</span>
            <a href="#" class="link-estendido"></a>
        </div>

        <div class="card">
            <img src="{{asset('img/eventos.svg')}}" alt="">
            <h2>Eventos</h2>
            <span>Ver todos</span>
            <a href="#" class="link-estendido"></a>
        </div>

        <div class="card">
            <img src="{{asset('img/projetos-sociais.svg')}}" alt="">
            <h2>Projetos sociais</h2>
            <span>Ver todos</span>
            <a href="#" class="link-estendido"></a>
        </div>
    </section>

    <section>
        <div class="tem-vaga-container">
            <div class="tem-vaga">
                <h2>Tem uma vaga ou curso?</h2>
                <span>Publique gratuitamente na nossa plataforma e alcance centenas de jovens talentos da comunidade.</span>
                <a href="#">Anunciar agora</a>
            </div>
        </div>
    </section>

@endsection