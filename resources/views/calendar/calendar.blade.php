<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/calendar/store" method="POST">
                        @csrf

                        <input type="datetime-local" name="storeStart" id="storeStart">
                        <input type="datetime-local" name="storeEnd" id="storeEnd">
                        <input type="text" name="title" value="Math course">

                        <button id="submitBtn">Submit</button>
                    </form>

                    <form method="POST">
                        @csrf
                        @method('PUT')
                        
                        <input type="datetime-local" name="updateStart" id="updateStart">
                        <input type="datetime-local" name="updateEnd" id="updateEnd">
                        <input type="text" name="title" value="Math course">

                        <button id="updateBtn">Update</button>
                    </form>

                    <form method="POST" id="deleteCourse">
                        @csrf
                        @method('DELETE')

                        <button id="deleteBtn">Delete</button>
                    </form>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
