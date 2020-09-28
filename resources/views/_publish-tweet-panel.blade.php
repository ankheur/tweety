<div class="border border-blue-400 rounded-lg py-6 px-8 mb-8">
    <form method="POST" action="{{ route('tweet') }}">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up ?" autofocus required :maxlength="tweetmax" v-model="tweet"></textarea>
        
        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ current_user()->avatar }}" alt="" class="rounded-full mr-2" width="50" height="50">
            <div class="flex items-center">
                @{{ tweetmax - tweet.length }}
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-10 ml-5 text-sm text-white h-10">Tweety!</button>
            </div>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>