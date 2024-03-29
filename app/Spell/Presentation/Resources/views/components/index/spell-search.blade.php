@php
/**
 * @var \Aquelarre\Spell\Domain\SearchResults\IndexResult $result
 */
@endphp
<form action="{{ route('spell.index') }}" method="GET">
    @csrf
    <div class="grid grid-cols-6 gap-4">
        <div>
            <label for="name">{{ __('common.name') }}</label>
            <input
                type="text"
                name="name"
                id="name"
                class="w-5/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
        </div>
        <div>
            <label for="name">{{ __('spell/spell.form') }}</label>
            <select
                name="form"
                id="form"
                class="w-5/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option value="" @if($result->searcher->form === null) selected @endif>
                    {{ __('spell/spell.form') }}
                </option>
                @foreach($result->forms as $form)
                    <option value="{{ $form->id }}" @if($result->searcher->form === $form->id) selected @endif>
                        {{ $form->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="name">{{ __('spell/spell.origin') }}</label>
            <select
                name="origin"
                id="origin"
                class="w-5/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option value="" @if($result->searcher->origin === null) selected @endif>
                    {{ __('spell/spell.origin') }}
                </option>
                @foreach($result->origins as $origin)
                    <option value="{{ $origin->id }}" @if($result->searcher->origin === $origin->id) selected @endif>
                        {{ $origin->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="name">{{ __('spell/spell.nature') }}</label>
            <select
                name="nature"
                id="nature"
                class="w-5/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option value="" @if($result->searcher->nature === null) selected @endif>
                    {{ __('spell/spell.nature') }}
                </option>
                @foreach($result->natures as $nature)
                    <option value="{{ $nature->id }}" @if($result->searcher->nature === $nature->id) selected @endif>
                        {{ $nature->id }} {{ $nature->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="name">{{ __('spell/spell.vis') }}</label>
            <select
                name="vis"
                id="vis"
                class="w-5/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option value="" @if($result->searcher->vis === null) selected @endif>
                    {{ __('spell/spell.vis') }}
                </option>
                @foreach($result->vises as $vis)
                    <option value="{{ $vis }}" @if($result->searcher->vis === $vis) selected @endif>
                        Vis {{ $vis }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button
                type="submit"
                class="inline-flex items-center btn btn-secondary shadow-md hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out mt-5"
            >
                <x-shared::icons.magnifier-search-zoom class="relative w-5 h-5 inline-flex" />
                <span class="inline-flex">{{ __('common.search') }}</span>
            </button>
        </div>
    </div>
</form>
