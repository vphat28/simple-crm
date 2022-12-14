@section('title', 'Subscribe to our list')
<x-guest-layout>
    <div class="mx-auto max-w-6xl mb-3 mt-3">
        @if ($errors->any())
            <div class="alert w-full alert-danger text-red-600 font-bold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="mx-auto max-w-6xl p-6 mt-3 flex sm:justify-center items-center bg-gray-100">
        <form class="w-full" method="post" action="subscribe">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        First Name
                    </label>
                    <input value="{{ old('firstname') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" name="firstname" placeholder="Jane">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Last Name
                    </label>
                    <input value="{{ old('lastname') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" name="lastname" placeholder="Doe">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="phone" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Phone number</label>
                    <input value="{{ old('phone_number') }}" type="tel" id="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="phone_number" placeholder="123-456-7889" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="budget" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Desired Budget</label>
                    <input type="text" value="{{ old('desired_budget') }}" id="budget" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="desired_budget" placeholder="899" pattern="[0-9]{*}" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label for="email-address" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email Address</label>
                    <input value="{{ old('email_address') }}" type="text" type="email" id="email-address" name="email_address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:mb-0 px-3">
                    <label for="message" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Message</label>
                    <textarea class="w-full rounded" id="message" name="message">{{ old('message') }}</textarea>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 text-white mt-4 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Subscribe
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
