<h1>Hi {{ $statement->email }}</h1>
<h4>Amount Credited {{ $statement->amount }}Rs</h1>
<h4>Your Current Balance {{ $statement->balance }}Rs</h1>
<h5>Time:{{ $statement->created_at }}</h5>