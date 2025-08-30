<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <div {{ $getExtraAttributeBag() }}>
        <ul class="!fi-list-disc fi-pl-5 fi-space-y-1">
            @foreach(str($getState())->explode(',') as $item)
                <li>
                    {{ str($item)->trim()->ucfirst()->toString() }}
                </li>
            @endforeach
        </ul>
    </div>
</x-dynamic-component>
