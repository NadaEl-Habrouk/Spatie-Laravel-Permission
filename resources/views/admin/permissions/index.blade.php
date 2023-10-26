<x-admin-layout>


    <div class="w-full py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end py-2">
                    <a href="{{route('admin.permissions.create')}}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Create Permission</a>

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
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr role="row">
                                        <td class="py-3 text-sm" role="cell">
                                            <div class="flex items-center gap-2">
                                                {{$permission->name}}

                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex justify-end">
                                                <div class=" flex space-x-2">
                                                    <a href="{{route('admin.permissions.edit',$permission->id)}}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                                    <form method="POST" action="{{route('admin.permissions.destroy',$permission->id)}}" onsubmit="return confirm('Are You Sure?')" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
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
