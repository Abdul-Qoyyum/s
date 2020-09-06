<table>
    <thead>
    <tr>
        <th>Main shoot date</th>
        <th>Client</th>
        <th>Company</th>
        <th>Email</th>
        <th>Business Number</th>
        <th>Job</th>
        <th>Job Type</th>
        <th>Location</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{{$task->start_date}}</td>
            <td>{{$task->client->firstname}} &nbsp; {{$task->client->lastname}}</td>
            <td>{{$task->client->company}}</td>
            <td>{{$task->client->email}}</td>
            <td>{{$task->client->businessno}}</td>
            <td>{{$task->name}}</td>
            <td>{{$task->job->name}}</td>
            <td>{{$task->location}}</td>
            <td>{!! $task->notes !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>