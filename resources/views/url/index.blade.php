<x-guest-layout>
    @component('components.flush-status-session')@endcomponent
    {{--    <div class="container mx-auto p-4">--}}

    <h2 class="text-2xl font-medium text-gray-900 mb-4">Mapped URL List</h2>
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
       href="{{ route('urls.create') }}">
        {{ __('Shorten URL') }}
    </a>

    <table class="w-full bg-white border border-gray-200">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">SL</th>
            <th class="py-2 px-4 border-b">Original Url</th>
            <th class="py-2 px-4 border-b">Short Url</th>
            <th class="py-2 px-4 border-b">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($urls as $url)
            <tr>
                <td class="py-2 px-4 border-b">{{$loop->iteration}}</td>
                <td class="py-2 px-4 border-b" title="{{$url->original_url}}">
                    {{substr($url->original_url, 0, 30 - 3)}}
                    @if (strlen($url) > 30)
                        ...
                    @endif
                </td>
                <td class="py-2 px-4 border-b">
                    <a href="{{route('urls.redirect',[$url->short_url])}}" target="_blank"
                       class="text-blue-500 hover:text-blue-700 inline-flex items-center">
                        {{route('urls.redirect',[$url->short_url])}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10.293 1.707a1 1 0 011.414 0L19 8.586a1 1 0 010 1.414l-7.293 7.293a1 1 0 01-1.414-1.414L15.586 10H5a1 1 0 110-2h10.586L10.293 3.121a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                </td>
                <td class="py-2 px-4 border-b">{{$url->about}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$urls->links()}}
    {{--    </div>--}}
</x-guest-layout>
