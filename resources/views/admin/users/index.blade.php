<x-admin-layout>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end py-2">

                </div>


                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table role="table" class="w-full min-w-[500px] overflow-x-scroll">
                        <thead>
                        <div class="w-full overflow-x-scroll px-4 md:overflow-x-hidden">
                            <table role="table" class="w-full min-w-[500px] overflow-x-scroll">
                                <thead>
                                <tr role="row">
                                    <th
                                        colspan="1"
                                        role="columnheader"
                                        title="Toggle SortBy"
                                        style="cursor: pointer"
                                    >
                                        <div
                                            class="flex items-center justify-between pb-2 pt-4 text-start uppercase tracking-wide text-gray-600 sm:text-xs lg:text-xs"
                                        >
                                            Name
                                        </div>
                                    </th>

                                    <th
                                        colspan="1"
                                        role="columnheader"
                                        title="Toggle SortBy"
                                        style="cursor: pointer"
                                    >
                                        <div
                                            class="flex items-center justify-between pb-2 pt-4 text-start uppercase tracking-wide text-gray-600 sm:text-xs lg:text-xs"
                                        >
                                            Email
                                        </div>
                                    </th>
                                </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr role="row">
                                <td class="py-3 text-sm" role="cell">
                                    <div class="flex items-center gap-2">
                                        {{$user->name}}

                                    </div>
                                </td>
                                <td class="py-3 text-sm" role="cell">
                                    <div class="flex items-center gap-2">
                                        {{$user->email}}

                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-end">
                                        <div class=" flex space-x-2">
                                            <a href="{{route('admin.users.show',$user->id)}}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a>
                                            <form method="POST" action="{{route('admin.users.destroy',$user->id)}}" onsubmit="return confirm('Are You Sure?')" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>

                                            </form>

                                        </div>

                                    </div>

                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
