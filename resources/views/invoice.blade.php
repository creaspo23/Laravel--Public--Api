<ul>
    <h1>Details For The Report: </h1>
    @forelse($user->requests as $req)
        <li>
            Full Name
            <p>{{ $req->name }}</p>
        </li>
        <li>
            Gender
            <p>{{ $req->gender }}</p>
        </li>
        <li>
            Age
            <p>{{ $req->age }}</p>
        </li>
        <li>
            Address
            <p>{{ $req->address }}</p>
        </li>
        <li>
            Injury
            <p>{{ $req->injury }}</p>
        </li>
        <li>
            Phone_Number
            <p>{{ $req->phone_number }}</p>
        </li>
    @empty
        <li>No Data yet </li>
    @endforelse
</ul>
