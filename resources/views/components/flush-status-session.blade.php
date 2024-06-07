@if(Session::has('success'))
    <div class="alert alert-success shadow-md rounded-md flex items-center mb-6">
        <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-3">
            <path fill-rule="evenodd"
                  d="M10.285 2.243c.08-.279.324-.5.57-.5h4.09c.246 0 .49.221.57.5l1.27 2.738 7.158 7.157c.225.225.225.59 0 .815s-.509.225-.734 0L14.582 11.825c-.197-.197-.4-.394-.6-.585l-2.738-7.157z"
                  clip-rule="evenodd"/>
        </svg>
        <div class="flex-grow">
            <p class="font-medium text-green-600">Success!</p>
            <p class="text-gray-600">{{ Session::get('success') }}</p>
        </div>
        <button type="button" class="ml-auto text-gray-400 hover:text-gray-500 focus:outline-none">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                      d="M6.72 16.72a.75.75 0 01-1.06 0L2.4 14.4a.75.75 0 111.06-1.06L6.72 16.72zm7.56-7.56a.75.75 0 01-1.06 0L12.4 10.34a.75.75 0 011.06 1.06L14.28 9.16z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
    </div>

@endif
@if(Session::has('error'))
    <div class="alert alert-error shadow-md rounded-md flex items-center mb-6">
        <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-3">
            <path fill-rule="evenodd"
                  d="M10.285 2.243c.08-.279.324-.5.57-.5h4.09c.246 0 .49.221.57.5l1.27 2.738 7.158 7.157c.225.225.225.59 0 .815s-.509.225-.734 0L14.582 11.825c-.197-.197-.4-.394-.6-.585l-2.738-7.157z"
                  clip-rule="evenodd"/>
        </svg>
        <div class="flex-grow">
            <p class="font-medium text-red-600">Error!</p>
            <p class="text-gray-600">{{ Session::get('error') }}</p>
        </div>
        <button type="button" class="ml-auto text-gray-400 hover:text-gray-500 focus:outline-none">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                      d="M6.72 16.72a.75.75 0 01-1.06 0L2.4 14.4a.75.75 0 111.06-1.06L6.72 16.72zm7.56-7.56a.75.75 0 01-1.06 0L12.4 10.34a.75.75 0 011.06 1.06L14.28 9.16z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
    </div>
@endif
