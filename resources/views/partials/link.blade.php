<li>
    <?php if (!isset($active)) $active = null; ?>
    <a href="{{ $link }}" class="{{ isMatchingRoute($link, 'is-active', $active) }}">{{ $title }}</a>
</li>