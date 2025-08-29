<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-100 dark:text-gray-100">

                    @if (auth()->user()->role->name == 'manager')
                        <span class="text-bold text-blue-500 text-2xl">Received Applications</span>


                        </br>
                        </br>
                        <!-- This is an example component -->
                        <div class='mt-6'>

                            @foreach($applications as $application)

                            <div class="rounded-2xl border p-5 mb-6 shadow-md w-10/12">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                        </div>
                                        <div class="text-lg font-bold">{{ $application->user->name }}</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button
                                            class="rounded-2xl border bg-neutral-700 px-3 py-1 text-xs font-semibold"># {{ $application->id}}</button>
                                        <div class="text-xs">{{ $application->created_at }}</div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-6">
                                    <div class="mb-3 text-xl font-bold">{{ $application->subject }}</div>
                                    <div class="text-sm">{{ $application->message }}</div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        {{ $application->user->email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach

                        {{ $applications->links() }}
                         
                    </div>
                    @elseif(auth()->user()->role->name == 'client')
                        <div
                            class='flex items-center justify-center bg-rgb(17 24 39 / var(--tw-bg-opacity, 1))'>
                            <div
                                class='w-full max-w-lg px-10 py-8 mx-auto bg-rgb(17 24 39 / var(--tw-bg-opacity, 1)) rounded-lg shadow-xl border-2'>
                                <div class='max-w-md mx-auto space-y-6'>

                                    <form action="{{ route('applications.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <h2 class="text-2xl font-bold ">Submit your application</h2>
                                        <hr class="my-6">
                                        <label class="uppercase text-sm font-bold opacity-100">Subject</label>
                                        <input type="text" name="subject" required class="p-3 mt-2 mb-4 w-full bg-slate-700 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                        <label class="uppercase text-sm font-bold opacity-100">Message</label>
                                        <textarea rows="5" name="message" required class="p-3 mt-2 mb-4 w-full bg-slate-700 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                                        <label class="uppercase text-sm font-bold opacity-100">File</label>
                                        <input type="file" name="file" class="p-3 mt-2 mb-4 w-full bg-slate-700 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                        <input type="submit"
                                            class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300"
                                            value="Send">
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
