<!DOCTYPE html>
<html>
<head>
    <title>Url shortener using Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Clicks</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td><a href="{{ route('shorten.link', $row->short_url) }}"
                               target="_blank">{{ route('shorten.link', $row->short_url) }}</a></td>
                        <td>{{ $row->clicks }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>