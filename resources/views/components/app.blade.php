<x-master>
    <main class="container mx-auto mb-5">
        <div class="lg:flex lg:justify-between">
            <div class="lg:w-32">
                @include('_sidebar-menu')
            </div>
            <div class="flex-1 lg:mx-10" style="max-width: 700px;">
                {{ $slot }}
            </div>
            <div class="lg:w-1/5">
                @include('_sidebar-social')
            </div>
        </div>
        
    </main>
</x-master>