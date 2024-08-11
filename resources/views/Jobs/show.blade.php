<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
  <h2 class='font-bold text-lg mb-1'>
    {{$job['title']}}
  </h2>
  <p class="text-lg">This job pays {{$job['salary']}} per year.</p>
  <button class="bg-gray-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5"><a href="/job/edit">Edit</a></button>
</x-layout>
