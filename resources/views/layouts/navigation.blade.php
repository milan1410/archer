<nav>
    <ul class="flex flex-col">
        <li>
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200 rounded">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('time-log.form') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200 rounded">
                Time Log
            </a>
        </li>

        <li>
            <a href="{{ route('logged-hours.index') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200 rounded">
                Logged Hours
            </a>
        </li>

        <!-- Add more menu items as needed -->
    </ul>
</nav>
