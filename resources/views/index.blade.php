@extends('apps.app')

@section('content')
    @include('sections.info',['card1'=>'Obyektlar', 'card2'=>'Ishlamoqda', 'card3'=>"No Soz",'card4'=>'Balans'])
    @include('sections.chart')
    @include('sections.working')
@endsection