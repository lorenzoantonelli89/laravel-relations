@extends('layouts.main-layout')
@section('title')
    Aggiungi car
@endsection
@section('content')

    <main>
        <h1>
            add new car
        </h1>
        
        <form method="POST" action="{{route('store')}}">

            @csrf
            @method('POST')
            <div>
                <div class="container-label">
                    <label for="model">
                        Model
                    </label>
                </div>
                <input type="text" name="model">
            </div>
            <div>
                <div class="container-label">
                    <label for="kW">
                        kW
                    </label>
                </div>
                <input type="number" name="kW">
            </div>
            <div>
                <div class="container-label">
                    <label for="brand">
                        Brand
                    </label>
                </div>
                <select name="brand_id" id="brand_id">
                    <option select disabled>
                        Select Brand
                    </option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand -> id}}">
                            {{$brand -> name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="submit">
                <input type="submit" value="Create Car">
            </div>
        </form>
    </main>
    
@endsection