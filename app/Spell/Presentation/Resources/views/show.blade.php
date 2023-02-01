@php
/**
 * @var \Aquelarre\Spell\Infrastructure\Models\Spell $spell
 */
@endphp
<x-shared::layouts.page>
    <div class="w-7/12 bg-primary-scroll rounded-b-2xl shadow-lg -mt-8 px-10 pb-8">
        <div>
            <a href="{{ route('spell.index') }}">
                <x-shared::icons.arrow class="flex inline-flex w-10 h-10 -rotate-45 relative float-left" />
            </a>
            <x-shared::typography.aq-title class="mt-10">
                {{ $spell->name }}
            </x-shared::typography.aq-title>
        </div>
        <hr class="bg-thunderbird">

        <div class="grid grid-cols-3">
            <div class="flex text-left">
                <x-shared::typography.aq-subtitle class="mt-10">
                    {{ __('spell/spell.form') }}:
                    <span class="font-sans text-base font-normal">
                        {{ $spell->form->name }}
                    </span>
                </x-shared::typography.aq-subtitle>
            </div>
            <div class="flex text-left">
                <x-shared::typography.aq-subtitle class="mt-10">
                    {{ __('spell/spell.origin') }}:
                    <span class="font-sans text-base font-normal">
                        {{ $spell->origin->name }}
                    </span>
                </x-shared::typography.aq-subtitle>
            </div>
            <div class="flex text-left">
                <x-shared::typography.aq-subtitle class="mt-10">
                    {{ __('spell/spell.nature') }}:
                    <span class="font-sans text-base font-normal">
                        {{ $spell->nature->name }}
                    </span>
                </x-shared::typography.aq-subtitle>
            </div>
        </div>
        <hr>

        <div class="grid grid-cols-3">
            <div class="flex text-left">
                <x-shared::typography.aq-subtitle class="mt-10">
                    {{ __('spell/spell.vis') }}:
                    <span class="font-sans text-base font-normal">
                        {{ $spell->vis }}
                    </span>
                </x-shared::typography.aq-subtitle>
            </div>
            <div class="flex text-left">
                <x-shared::typography.aq-subtitle class="mt-10">
                    {{ __('spell/spell.expiration') }}:
                    <span class="font-sans text-base font-normal">
                    {{ $spell->expiration }}
                </span>
                </x-shared::typography.aq-subtitle>
            </div>
            <div class="flex text-left">
                <x-shared::typography.aq-subtitle class="mt-10">
                    {{ __('spell/spell.duration') }}:
                    <span class="font-sans text-base font-normal">
                    {{ $spell->duration }}
                </span>
                </x-shared::typography.aq-subtitle>
            </div>
        </div>
        <hr>

        <div class="flex text-left">
            <x-shared::typography.aq-subtitle class="mt-10">
                {{ __('spell/spell.components') }}:
                <span class="font-sans text-base font-normal">
                    {{ $spell->components }}
                </span>
            </x-shared::typography.aq-subtitle>
        </div>
        <hr>

        <div class="flex text-left">
            <x-shared::typography.aq-subtitle class="mt-10">
                {{ __('spell/spell.preparation') }}:
                <span class="font-sans text-base font-normal">
                    {{ $spell->preparation }}
                </span>
            </x-shared::typography.aq-subtitle>
        </div>
        <hr>

        <div class="flex text-left">
            <x-shared::typography.aq-subtitle class="mt-10">
                {{ __('common.description') }}:
                <span class="font-sans text-base font-normal">
                    {{{ $spell->description }}}
                </span>
            </x-shared::typography.aq-subtitle>
        </div>
    </div>
</x-shared::layouts.page>
