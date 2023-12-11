@props(['size' => '50', 'text'])

<div class="flex items-center gap-5">
  <iconify-icon icon="twemoji:running-shoe" width="{{ $size }}"></iconify-icon>
  @if (isset($text))
    <p class="text-2xl font-bold">{{ $text }}</p>
  @endif
</div>
