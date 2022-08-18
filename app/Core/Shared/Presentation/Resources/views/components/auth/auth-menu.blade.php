<div class="flex justify-center">
    <button
        id="dropdownAvatarNameButton"
        data-dropdown-toggle="dropdownAvatarName"
        class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
        type="button"
    >
        <span class="sr-only">Open user menu</span>
        <img class="mr-2 w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
        {{ $user->name }}
        <x-shared::icons.caret />
    </button>

    <!-- Dropdown menu -->
    <div
        id="dropdownAvatarName"
        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 block"
        style="position: absolute; inset: 0 auto auto 0; margin: 0; transform: translate(1050px, 62px);"
        data-popper-reference-hidden=""
        data-popper-escaped=""
        data-popper-placement="bottom"
    >
        <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
            <div class="font-medium ">Pro User</div>
            <div class="truncate">name@flowbite.com</div>
        </div>
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownAvatarNameButton">
            <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
            </li>
        </ul>
        <div class="py-1">
            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
        </div>
    </div>
</div>
