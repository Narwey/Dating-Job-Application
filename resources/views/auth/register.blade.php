<x-layout>
    <x-slot:heading>
       Register
    </x-slot:heading>
<form method="POST" action="/register">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Account</h2>

        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-4">
                <x-form-label for="name">Name</x-form-label>
                <div class="mt-2">
                    <x-form-input name="name" id="name" placeholder="Anouar" required></x-form-input>
                    <x-form-error name="name"></x-form-error>
                </div>
              </div>

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
                <x-form-input type='password' name="password" id="password" placeholder="" required></x-form-input>
                <x-form-error name="password"></x-form-error>
                    </div>
            </div>
            <div class="sm:col-span-4">
                <x-form-label for="password">Confirm Password</x-form-label>
                    <div class="mt-2">
                        <x-form-input type='password' name="confirm_password" id="confirm_password" required></x-form-input>
                        <x-form-error name="confirm_password"></x-form-error>
                    </div>
            </div>

        </div>
      </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
    </div>
  </form>
</x-layout>
