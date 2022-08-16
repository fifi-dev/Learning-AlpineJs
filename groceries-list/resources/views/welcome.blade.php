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
    <title>Presence List</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto mt-5 p-3" 
        x-data="userInit({{ Js::from($users) }})"
        x-init="userWatchInit()"
    >
        <div class="my-5 text-gray-900">
            Nombre de presence: 0
        </div>

        @foreach($users as $user)
        <x-tools.checkbox 
            :label="$user->name"
            :value="$user->id"
            x-model="userIDs"
        />
        @endforeach
    </div>
    <script>
        function userInit(users){
            return{
                users: users,
                userIDs: [],

                userWatchInit() {
                    this.$watch('userIDs' (userIDs) =>{

                    })
                }
            }
        }
    </script>
</body>
</html>