@if ($errors -> any())
<div class="red">
    <ul>
        @foreach ($errors -> all() as $error)
        {{$error}}
        @endforeach
    </ul>
</div>

@endif