<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
     <h1>Doctor Detail Page</h1>
     <div class="container">
        <h1>{{ $doctor->user->name }}</h1>
        <p>Specialization: {{ $doctor->specialization }}</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h2>Available Slots</h2>
        <a href="{{route('appointments.earliest', $doctor->id)}}" >Show all availablities</a>
        <ul>
            @foreach ($doctor->slots as $slot)
                <li>
                    {{ $slot->date }} - {{ $slot->time }} ({{ $slot->duration }} minutes)
                    @if ($slot->available)
                        <form action="{{ url('/appointments') }}" method="POST">
                            @csrf
                            <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                            <!-- id: 2 is for patient in database -->
                            <input type="hidden" name="patient_id" value="{{ Auth::user()->patient->id ?? '1' }}">
                            <button type="submit" class="btn btn-primary">Book Appointment</button>
                        </form>
                    @else
                        <button class="btn btn-success" disabled>Booked</button>
                    @endif
                </li>
            @endforeach

        </ul>
    </div>
</div>
