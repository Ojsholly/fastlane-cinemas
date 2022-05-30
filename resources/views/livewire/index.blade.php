<div>
    @section('title', 'Welcome to Fastlane Cinemas')

    @section('content')
        <div>
            <table class="w-full mb-6 table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">SN</th>
                    <th class="px-4 py-2">Movie</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Poster</th>
                    <th class="px-4 py-2">Show Times</th>
                </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $movie->title }}</td>
                        <td class="px-4 py-2 border">{{ $movie->description }}</td>
                        <td class="px-4 py-2 border"><img src="{{ $movie->poster }}" alt="{{ $movie->title.' Poster' }}"></td>
                        <td class="px-2 py-2 border">
                            @foreach($movie->schedules as $schedule)
                                {{ $loop->iteration }}. {{ $schedule->branch->location }}. <b>{{ $schedule->start_at }}</b><br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</div>
