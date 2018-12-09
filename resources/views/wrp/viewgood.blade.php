@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $good->name }}</div>

                <div class="card-body">
                  <div class="resources">
                    {{ $good->quantity }}
                  </div>

                  <form action="/stock" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="good-id" value="{{ $good->id }}">
                    <input type="text" name="quantity" id="good-quantity" value="{{ $good->quantity }}">
                    <button>Update</button>
                  </form>

                  <div class="log">
                    <table>
                      <tr><td>Benutzer</td><td>Methode</td><td>Anzahl</td><td>Zeitpunkt</td></tr>
                      @foreach ($log as $entry)
                        <tr><td>{{ $entry->user_name }}</td><td>{{ $entry->action }}</td><td>{{ $entry->quantity }}</td><td>{{ $entry->created_at }}</td></tr>
                      @endforeach
                    </table>
                  </div>

                  <form action="/good/delete" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="good-id" value="{{ $good->id }}">

                    <button type="submit" class="btn btn-default">
                      <i class="fa fa-plus"></i> Löschen
                    </button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
