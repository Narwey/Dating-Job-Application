<x-layout>
    <x-slot:heading>
       Login
    </x-slot:heading>
<form method="POST" action="/login">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <x-form-label for="email">Email</x-form-label>
                <div class="mt-2">
                    <x-form-input type='email' name="email" id="email" placeholder="test@gmail.com" required></x-form-input>
                    <x-form-error name="email"></x-form-error>
                </div>
              </div>
            <div class="sm:col-span-4">
                <x-form-label for="salary">Password</x-form-label>
                    <div class="mt-2">
                <x-form-input type='password' name="password" id="password" placeholder="#############" required></x-form-input>
                <x-form-error name="password"></x-form-error>
                    </div>
            </div>
        </div>
      </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Register</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
    </div>
  </form>
</x-layout>
