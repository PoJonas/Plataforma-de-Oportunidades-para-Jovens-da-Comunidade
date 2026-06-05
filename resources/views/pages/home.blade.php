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

            <a href="#" class="btn-cursos"><img src="{{asset('img/book-open-white.svg')}}" alt="" class="book-white">Ver Cursos</a>

        </div>
    </section>
@endsection