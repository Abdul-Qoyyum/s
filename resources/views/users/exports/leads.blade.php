<table>
    <thead>
    <tr>
        <th>Lead created </th>
        <th>Lead</th>
        <th>Type</th>
        <th>Location</th>
        <th>Main shoot date</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr>
            <td>{{$lead->created_at->diffForHumans()}}</td>
            <td>{{$lead->name}}</td>
            <td>{{$lead->job->name}}</td>
            <td>{{$lead->location}}</td>
            <td>{{$lead->start_date ? \Carbon\Carbon::parse($lead->start_date)->toFormattedDateString() : ''}}</td>
            <td>{!! $lead->notes !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>