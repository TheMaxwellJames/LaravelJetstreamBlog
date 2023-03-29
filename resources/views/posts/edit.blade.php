<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    
    @if(Session::has('message'))
                    <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800 ">
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif

    <div class="container mx-auto sm:px-4 mx-auto sm:px-4 pt-10 mx-auto sm:px-4">
        <div class="flex flex-wrap  justify-center">
            <div class="md:w-full pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">Post - edit</div>

                    <div class="flex-auto p-6">
                        {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                        <div class="mb-4 @if($errors->has('thumbnail')) has-error @endif">
                        {!!Form::file('post_image')!!}
                            @if ($errors->has('post_image'))
                                <span class="help-block">{!! $errors->first('post_image') !!}</span>@endif
                        </div>
                       
                        <div class="mb-4 @if($errors->has('title')) has-error @endif">
                            {!! Form::label('Title') !!}
                            {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                            @if ($errors->has('title'))
                                <span class="help-block">{!! $errors->first('title') !!}</span>@endif
                        </div>

                        <div class="mb-4 @if($errors->has('details')) has-error @endif">
                            {!! Form::label('Details') !!}
                            {!! Form::textarea('details', $post->details, ['class' => 'form-control', 'placeholder' => 'Details']) !!}
                            @if ($errors->has('details'))
                                <span class="help-block">{!! $errors->first('details') !!}</span>@endif
                        </div>

                        <div class="mb-4">
                            {!! Form::label('Publish') !!}
                            {!! Form::select('is_published', [1 => 'Publish', 0 => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Update',['class' => 'bg-blue-500 hover:bg-blue-700 cursor-pointer text-white font-bold py-2 px-4 rounded']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('details');
        });
    </script>

</x-app-layout>