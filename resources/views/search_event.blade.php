@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Recherche d'une manifestation</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('search_event') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('categorie') ? ' has-error' : '' }}">
                           <label for="categorie" class="col-md-4 control-label">Catégorie</label>

                            <div class="col-md-6">
                                <select id="categorie" class="form-control" name="categorie" value="{{ old('categorie') }}" required>
                                @foreach(App\Models\EventCategories::all() as $category)
                                        <option value="{{ $category->id }}" > {{ $category->label }} </option> 
                                @endforeach
                                <option value=*>Tout</option>
                                </select>

                                @if ($errors->has('categorie'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categorie') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      

                        <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
                            <label for="ville" class="col-md-4 control-label">Ville</label>

                            <div class="col-md-6">
                                <input id="ville" type="ville" class="form-control" name="ville" value="{{ old('ville') }}" required>

                                @if ($errors->has('ville'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ville') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Valider
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