<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('images/icons/plastictecnic-icon-transparent.png') }}" class="logo" alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
