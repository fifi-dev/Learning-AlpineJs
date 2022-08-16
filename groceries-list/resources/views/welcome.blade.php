@php
    $users = App\Models\User::all();
   // @dd($users)
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groceries List</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto mt-5 p-3">
        <div class="my-5 text-gray-900">
            Achats restants: 0
        </div>

        @foreach($users as $user)
        <x-tools.checkbox :label="$user->name" />
        @endforeach
    </div>
</body>
</html>