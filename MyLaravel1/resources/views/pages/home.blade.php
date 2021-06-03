@extends('layouts.main-layout')
@section('title')
    Home
@endsection
@section('content')

    <main>
        <h1>
            lista car
        </h1>
        <a id="newCar" href="{{route('newCar')}}">
            add new car
        </a>
        <table>
            <tr>
                <th>
                    id
                </th>
                <th>
                    name
                </th>
                <th>
                    kw
                </th>
            </tr>
            @foreach ($cars as $car)
                <tr>
                    <td>
                        <a href="{{route('details', $car -> id)}}">
                            {{$car -> id}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('details', $car -> id)}}">
                            {{$car -> model}}
                        </a>
                    </td>
                    <td>
                        {{$car -> kW}}
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
    
@endsection