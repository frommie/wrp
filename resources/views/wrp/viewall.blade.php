@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lagerbestand</div>

                <div class="card-body">
                  <table class="resources">
                    @foreach ($goods as $good)
                      <tr><td><a href="/good/{{ $good->id }}">{{ $good->name }}</a></td><td>{{ $good->quantity }}</td></tr>
                    @endforeach
                  </table>

                  <div>
                    <a href="/add">Neuer Eintrag</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
