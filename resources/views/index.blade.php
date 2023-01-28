@extends('apps.app')

@section('content')
    @include('sections.info',['card1'=>'Obyektlar', 'card2'=>'Ishlamoqda', 'card3'=>"Tok yo'q",'card4'=>'Qarzdorlik'])
    @include('sections.chart')
    @include('sections.working')
@endsection