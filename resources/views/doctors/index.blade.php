<div>
    <!-- Well begun is half done. - Aristotle -->
     <h1>Doctors Listing page</h1>
     <div class="container">
        <h1>Doctors</h1>
        <ul>
            @foreach ($doctors as $doctor)
                <li><a href="{{ url('/doctor', $doctor->id) }}">{{ $doctor->user->name }} - {{ $doctor->specialization }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
