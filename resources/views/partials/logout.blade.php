<?php
if (!isset($text)) $text = 'Logout';
if (!isset($class)) $class = '';
if (!isset($icon)) $icon = false;
?>

<form action="/logout" method="POST">
    {{ csrf_field() }}
    <button class="{{ $class }}" style="cursor: pointer;">
        @if($icon) <b-icon icon="logout-variant" class="is-left"></b-icon> @endif
        {{ $text }}
    </button>
</form>
