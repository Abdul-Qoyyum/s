<table>
    <thead>
    <tr>
        <th>First name</th>
        <th>Last Name</th>
        <th>Company</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Business Number</th>
        <th>State</th>
        <th>Suburb/Town</th>
        <th>Country</th>
        <th>Postcode</th>
        <th>Address</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{$client->firstname}}</td>
            <td>{{$client->lastname}}</td>
            <td>{{$client->company}}</td>
            <td>{{$client->phone}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->businessno}}</td>
            <td>{{$client->state}}</td>
            <td>{{$client->town}}</td>
            <td>{{$client->country}}</td>
            <td>{{$client->postcode}}</td>
            <td>{{$client->address}}</td>
            <td>{!! $client->notes !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>