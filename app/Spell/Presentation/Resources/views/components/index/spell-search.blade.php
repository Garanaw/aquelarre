@php
/**
 * @var \Aquelarre\Spell\Domain\SearchResults\IndexResult $result
 */
@endphp
<form action="{{ route('spell.index') }}" method="POST">
    @csrf
    <div class="grid grid-cols-6 gap-4">
        <div>
            <label for="name">{{ __('common.name') }}</label>
            <input type="text" name="name" id="name" class="">
        </div>
        <div>
            <label for="name">{{ __('spell/spell.form') }}</label>
            <select name="form" id="form">
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
            <select name="origin" id="origin">
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
            <select name="nature" id="nature">
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
            <select name="vis" id="vis">
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
            <button type="submit" class="dice">{{ __('common.search') }}</button>
        </div>
    </div>
</form>
