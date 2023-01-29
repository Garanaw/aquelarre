@php
/**
 * @var \Aquelarre\Spell\Domain\SearchResults\IndexResult $result
 */
$spells = $result->paginator->items();
@endphp
<x-shared::layouts.page>
    <div class="w-7/12">
        <x-shared::typography.aq-title>
            Hechizos
        </x-shared::typography.aq-title>

        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <x-spell::index.spell-search :result="$result" />
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">{{ __('common.name') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('spell/spell.form') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('spell/spell.origin') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('spell/spell.nature') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('spell/spell.vis') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('book/book.title') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('common.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($spells as $spell)
                    <x-spell::index.spell-row :spell="$spell" />
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $result->paginator->links() }}
        </div>
    </div>
</x-shared::layouts.page>
