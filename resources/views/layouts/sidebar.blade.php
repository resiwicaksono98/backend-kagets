<div class="w-1/5 bg-gray-800 min-h-screen px-4 pt-6">
    <div class="mb-8">
        <header class="font-extrabold px-2 text-gray-400 uppercase text-xs">
            Kagets App
        </header>
        </div>
    <div class="mb-8">
        <header class="font-medium px-2 text-gray-400 uppercase text-xs">
            Main
        </header>
        <a href="{{ route('dashboard') }}" class="block text-gray-200 px-2 py-2">Dashboard</a>
        <hr class="opacity-25 mt-2 rounded-full"> 
    </div>

    @can('create complaints')
    <div class="mb-8">
        <header class="font-medium px-2 text-gray-400 uppercase text-xs">
            Complaint
        </header>
        <a href="{{ route('complaint.create') }}" class="block text-gray-200 px-2 py-2">Create</a>
        <a href="{{ route('complaint.table') }}" class="block text-gray-200 px-2 py-2">Table</a>
        <hr class="opacity-25 mt-2 rounded-full"> 
    </div>
    @endcan

    @if (Auth::user()->can('create news'))
        <div class="mb-8">
            <header class="font-medium px-2 text-gray-400 uppercase text-xs">
                News
            </header>
            <a href="{{ route('news.create') }}" class="block text-gray-200 px-2 py-2">Create</a>
            <a href="{{ route('news.table') }}" class="block text-gray-200 px-2 py-2">Table</a>
            <hr class="opacity-25 mt-2 rounded-full"> 
        </div>
    @endif

       
 

    @if (Auth::user()->can('create category'))
        <div class="mb-8">
            <header class="font-medium px-2 text-gray-400 uppercase text-xs">
                Category
            </header>
            <a href="{{ route('category.create') }}" class="block text-gray-200 px-2 py-2">Create</a>
            <a href="{{ route('category.table') }}" class="block text-gray-200 px-2 py-2">Table</a>
            <hr class="opacity-25 mt-2 rounded-full"> 
        </div>
    @endif
 

    @can('create problem')
    <div class="mb-8">
        <header class="font-medium px-2 text-gray-400 uppercase text-xs">
            Problem
        </header>
        <a href="{{ route('problem.create') }}" class="block text-gray-200 px-2 py-2">Create</a>
        <a href="{{ route('problem.table') }}" class="block text-gray-200 px-2 py-2">Table</a>
        <hr class="opacity-25 mt-2 rounded-full"> 
    </div>
    @endcan

  
   
    <div class="mb-8">
        <header class="font-medium px-2 text-gray-400 uppercase text-xs">
            User
        </header>
        <a href="{{ route('user.table') }}" class="block text-gray-200 px-2 py-2">Table</a>
        <hr class="opacity-25 mt-2 rounded-full"> 
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="route('logout') " class="block text-gray-200 px-2 py-2"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </a>
        
    </form>
    
</div>
