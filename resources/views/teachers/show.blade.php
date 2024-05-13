<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teachers List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
               
                    <div class="mb-4">
                        <a href="{{ route('teachers.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Create Teacher</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">First Name</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Surname</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Age</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Email</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Phone Number</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $teacher->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $teacher->first_name }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $teacher->surname }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $teacher->age }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $teacher->email }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $teacher->phone_number }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $teacher->gender == 0 ? 'Male' : 'Female'  }}</td>

                                <td class="border px-4 py-2 text-center">
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $teacher->id }}')">Delete</button>
                                </td>

                            </tr>
                          
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // forma 1
    function confirmDelete(id) {
        alertify.confirm("¿Confirm delete record?",
        function(){
            let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/teachers/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
            alertify.success('Ok');
        },
        function(){
            alertify.error('Cancel');
        });
    }

// forma 2
/* function confirmDelete(id) {
    alertify.confirm("¿Confirm delete record?", function (e) {
        if (e) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/teachers/' + id;
            form.innerHTML = '@csrf @method("DELETE")';
            document.body.appendChild(form);
            form.submit();
        } else {
            alertify.error('Cancel');
            return false;
        }
    });
} */
</script>
