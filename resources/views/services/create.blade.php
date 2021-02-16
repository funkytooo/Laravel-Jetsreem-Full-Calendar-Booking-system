<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Service
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('services.store') }}">
                    @csrf
                    <div class="form-row" class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                        
                            <input type="text" name="name" id="name" placeholder = "Name" class="form-input" value="{{ old('name', '') }}">
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        
                            <input type="text" name="duration" id="duration" placeholder = "Duration"class="form-input" value="{{ old('duration', '') }}">
                            @error('duration')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        
                            <input type="text" name="price" id="price" placeholder = "Price"class="form-input" value="{{ old('price', '') }}">
                            @error('price')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <x-jet-secondary-button type="submit" class="mx-auto" value="submit">
                                Submit
                            </x-jet-secondary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

