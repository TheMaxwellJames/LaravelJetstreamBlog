<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>





      <!--create post-->
      <div class="container mx-auto sm:px-4 mx-auto sm:px-4 mx-auto sm:px-4 pt-10 mx-auto sm:px-4">
        <div class="flex flex-wrap">
            <div class="relative flex-grow max-w-full flex-1 px-4">
                @if(Session::has('message'))
                    <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800 ">
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif

                @if(Session::has('delete-message'))
                    <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800 ">
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('delete-message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            <div class="md:w-full pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                        Post - list
                        <a href="{{ route('posts.create') }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline py-1 px-2 leading-tight text-xs  bg-blue-600 text-white hover:bg-blue-600 float-right">Add
                            New</a>
                    </div>

                    <div class="flex-auto p-6">
                        <table class="w-full max-w-full mb-2 bg-transparent table-auto table-bordered mb-0">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th class = "w-43 pr-12">Title</th>
                              <th class = "pr-6">Created By</th>
                              <th class = "pr-20">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td class ="pl-20">{{ $post->title }}</td>
                                    <td class ="pl-20">{{ $post->user->name }}</td>
                                    <td class ="pl-20">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline py-1 px-2 leading-tight text-xs bg-blue-600 text-white hover:bg-blue-600">Edit</a>
                                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'bg-red-500 hover:bg-red-700 cursor-pointer text-white font-bold py-1 px-2 rounded leading-tight text-xs no-underline']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
</x-app-layout>
