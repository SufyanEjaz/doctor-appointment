<div>
    <h2>Available Slots for {{$doctorData['name']}} - {{ $doctorData['specialization'] }}</h2>
    <ul>
        @foreach ($doctorData['slots'] as $slot)
            <li>
                {{ $slot->date }} - {{ $slot->time }} ({{ $slot->duration }} minutes)
            </li>
        @endforeach

    </ul>
</div>
