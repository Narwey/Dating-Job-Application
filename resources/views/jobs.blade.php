<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>
    <div class="space-y-6 py-4">
        @foreach ($jobs as $job)

                <a href="/job/{{$job['id']}}" class=" block px-4 py-6 border border-gray-300 rounded-lg">
                    <div class="text-lg text-blue-500 py-2">
                        {{$job->employer->name}}
                    </div>
                    <strong> {{$job['title']}} </strong>  : Pays {{$job['salary']}} per Year .
                </a>
        @endforeach
    </div>
    <div>
        {{$jobs->links()}}
    </div>

</x-layout>
