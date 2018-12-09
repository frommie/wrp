@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produkt hinzufügen</div>

                <div class="card-body">
                  <form action="/good/add" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Good Name -->
                    <div class="form-group">
                      <label for="good" class="col-sm-3 control-label">Produkt</label>

                      <div class="col-sm-6">
                        <input type="text" name="name" id="good-name" class="form-control">
                      </div>
                    </div>

                    <!-- Good Quantity -->
                    <div class="form-group">
                      <label for="quantity" class="col-sm-3 control-label">Menge</label>

                      <div class="col-sm-6">
                        <input type="text" name="quantity" id="good-quantity" class="form-control">
                      </div>
                    </div>


                    <!-- Add Task Button -->
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                          <i class="fa fa-plus"></i> Speichern
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
