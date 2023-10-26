<x-admin-layout> <div class="py-12 w-full"> <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <div
    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
    <div class="flex py-2">
    <a href="{{route('admin.users.index')}}"
    class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Index User</a>

    </div>
    <div class="flex flex-col p-2 bg-slate-100">
        <div>User Name: {{$user->name}}</div>
        <div>User Email: {{$user->email}}</div>
    </div>
    <div class="mt-6 p-2 bg-slate-100" >
    <h2 class="text-2xl font-semibold">Roles</h2>
    <div class=" flex space-x-2 mt-4 p-2">
        @if($user->roles)
        @foreach($user->roles as $user_role)
        <form method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
            onsubmit="return confirm('Are You Sure?')" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white
            rounded-md"> @csrf @method('DELETE') <button type="submit">{{$user_role->name}}</button> </form>


          @endforeach

            @endif
    </div>
    <div class = "max-w-xl mt-6">
    <form method="POST" action="{{ route('admin.users.roles',$user->id) }}">
    @csrf
    <div class="sm:col-span-6">
    <label for="role" class="block text-sm font-medium text-gray-700"> Roles </label>
    <select id="role" name="role" autocomplete="role-name" class="mt-1 block w-full py-2 px-3">
        @foreach($roles as $role)
        <option value="{{$role->name}}">{{$role->name}}</option>


        @endforeach

        </select>
        </div>

        @error('role')<span class="text-red-400 text-sm">{{$message}}</span> @enderror
        </div>

        <div class="sm:col-span-6 pt-5">
        <button type="submit"
        class="px-4 py-2 bg-green-500 hover:bg-green-300 text-slate-100 rounded-md">
        Assign
        </button>
        </div>

        </form>

        </div>


        </div>

        <div class = "max-w-xl mt-6">
      <h2 class="text-2xl font-semibold space-x-2 mt-4 p-2">Permissions</h2>
       <div class=" flex space-x-2 mt-4 p-2">
        @if($user->permissions)
        @foreach($user->permissions as $user_permission)
        <form method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
            onsubmit="return confirm('Are You Sure?')" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white
            rounded-md"> @csrf @method('DELETE') <button type="submit">{{$user_permission->name}}</button>
        </form>


        @endforeach

        @endif
        </div>
        <div class="max-w-xl mt-6">
            <form method="POST" action="{{ route('admin.users.permissions',$user->id) }}">
                @csrf
                <div class="sm:col-span-6">
                 <label for="permission" class="block text-sm font-medium text-gray-700"> Permission </label>
                <select id="permission" name="permission" autocomplete="permission-name" class="mt-1 block w-full py-2 px-3">
                  @foreach($permissions as $permission)
                <option value="{{$permission->name}}">{{$permission->name}}</option>

                        @endforeach

                    </select>
                </div>

                @error('name')<span class="text-red-400 text-sm">{{$message}}</span> @enderror
        </div>

        <div class="sm:col-span-6 pt-5">
            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-300 text-slate-100 rounded-md">
                Assign
            </button>
        </div>

        </form>

        </div>


        </div>

        


        </x-admin-layout>