@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Exvb')
<img width="120" src="{{ asset('assets/logomark.png') }}" alt="Exvb Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
