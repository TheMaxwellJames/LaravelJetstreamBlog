<x-guest-layout>

    <div class="grid grid-cols-1 md:grid-cols-3 p-12 justify-items-center">
    @foreach($posts as $post)
    <div class="max-w-xs rounded overflow-hidden shadow-lg my-20">
      <img class="w-full" src="/storage/post_images/{{$post->post_image}}" alt="Sunset in the mountains">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
        <p class="text-grey-darker text-base">{!! $post->details !!} </p>
        <div>on {{ date('M d, Y', strtotime($post->created_at)) }}</div>
        <div>{{ $post->user->name }}</div>
      </div>
      <div class="px-6 py-4">
        <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
        <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
        <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
      </div>
    </div>
    @endforeach
    </div>
    
    </x-guest-layout>