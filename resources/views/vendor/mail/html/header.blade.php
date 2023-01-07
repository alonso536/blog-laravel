@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'The Basement')
<h2 class="title">The Basement Notes</h2>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
