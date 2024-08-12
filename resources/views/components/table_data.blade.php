<tr class="column">
    <td class="p-4 border-b border-gray-300">
        <div class="flex flex-col">
            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70">
                {{ $id ?? '' }}
            </p>
        </div>
    </td>
    <td class="p-4 border-b border-gray-300">
        <div class="flex flex-col">
            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70">
                {{ $name }}
            </p>
        </div>
    </td>
    @if (isset($price))
        <td class="p-4 border-b border-gray-300">
            <div class="flex flex-col">
                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70">
                    {{ $price }}
                </p>
            </div>
        </td>
    @endif
    @if (isset($type))
        <td class="p-4 border-b border-gray-300">
            <div class="flex flex-col">
                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70">
                    {{ $type }}
                </p>
            </div>
        </td>
    @endif
    @if (isset($image))
        <td class="p-4 border-b border-gray-300">
            {{ $image }}
        </td>
    @endif
    <td class="p-4 border-b border-gray-300">
        {{ $actions }}
    </td>
</tr>
