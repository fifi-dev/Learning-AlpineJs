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

    <div
        class="container mx-auto mt-5 p-3"
        x-data="userInit({{ Js::from($users) }})"
        x-init="userWatchInit()"
    >
        <div class="my-5 text-gray-900" x-ref="count">Nombre de presence : 0</div>
        <div class="mb-8 text-red-900" x-ref="absence"></div>

        @foreach($users as $user)
            <x-tools.checkbox
                :label="$user->name"
                :value="$user->id"
                x-model="userIDs"
            />
        @endforeach
    </div>
    <script>
        function userInit(users) {
            return {
                users: users,
                userIDs: [],
                userWatchInit() {
                    this.$watch('userIDs', (userIDs) => {
                        var absence = users.length - userIDs.length;
                        this.$refs.count.innerText =  'Nombre de presence : ' + userIDs.length;
                        this.$refs.absence.innerText =  absence + ' absents';
                        //console.log(absence)

                        if (userIDs.length <= 3 ) {
                            this.$refs.count.classList.remove('text-gray-900')
                            this.$refs.count.classList.add('text-orange-300')
                        }
                        
                        if (userIDs.length <= 6 && userIDs.length > 3) {
                            this.$refs.count.classList.remove('text-orange-300')
                            this.$refs.count.classList.add('text-yellow-300')
                        }

                        if (userIDs.length <= 10 && userIDs.length > 6) {
                            this.$refs.count.classList.remove('text-yellow-400')
                            this.$refs.count.classList.add('text-green-500')
                        }
                        if (userIDs.length === this.users.length) {
                            this.$refs.count.innerText = 'Tout le monde est présent !';
                        }

                        if (absence === 0){
                            this.$refs.absence.classList.add('hidden')
                        }

                    })
                }
            }
        }
    </script>
</body>
</html>