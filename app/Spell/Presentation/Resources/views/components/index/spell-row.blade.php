@php
/**
 * @var \Aquelarre\Spell\Infrastructure\Models\Spell $spell
 */
@endphp
<tr class="border-b dark:bg-gray-900 dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $spell->name }}</th>
    <td class="px-6 py-4">{{ $spell->form->name }}</td>
    <td class="px-6 py-4">{{ $spell->origin->name }}</td>
    <td class="px-6 py-4">{{ $spell->nature->name }}</td>
    <td class="px-6 py-4">{{ $spell->vis }}</td>
    <td class="px-6 py-4">{{ $spell->book->name }}</td>
    <td class="px-6 py-4">
{{--        <a class="btn" href="{{ route('spells.show', ['spell' => $helper->id($spell->getId())]) }}">--}}
{{--            {{ __('common.watch') }}--}}
{{--        </a>--}}
    </td>
</tr>
