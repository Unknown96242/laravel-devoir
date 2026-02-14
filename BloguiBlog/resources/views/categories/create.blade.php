 @extends('base')

 @section('title', 'Creer une categorie')

 @section('content')
 <h3>
     Formulaire de creation d'une categorie
 </h3>
 <a href="{{ route('categories.index') }}" class="mx-12 inline-block">
     <button class="p-4 bg-blue-800 text-white rounded-2xl">
         Retour à la liste des categories
     </button>
 </a>

 @if ($errors->any())
     <div class="bg-red-600
         text-white w-full">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

 @if (Session::has('success'))
     <div class="bg-green-600 text-white w-full">
         {{ Session::get('success') }}
     </div>
 @endif
 <form action="{{ route('categories.store') }}" method="POST">
     @csrf
     <div class="form-group">
         <label for="nom">
             Nom de la categorie
         </label>
         <input type="text" name="nom" id="nom" class="form-control mb-3">
     </div>
     <button type="submit" class="bg-green-700 text-white btn-lg">
         Enregistrer
     </button>
 </form>
@endsection
