@section('title', 'Subscriber')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscriber') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="leading-tight text-xl">{{ __('Name') }}</h3>
                    <p class="mb-3">{!! $subscriber->name !!}</p>
                    <h3 class="leading-tight text-xl">{{ __('Phone Number') }}</h3>
                    <p class="mb-3">{!! $subscriber->phone_number !!}</p>
                    <h3 class="leading-tight text-xl">{{ __('Email') }}</h3>
                    <p class="mb-3">{!! $subscriber->email_address !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
