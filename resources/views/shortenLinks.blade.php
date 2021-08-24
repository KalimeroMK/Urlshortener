<!DOCTYPE html>
<html>
<head>
    <title>Url shortener using Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <form method="POST" action="{{ route('generate.shorten.link.post') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="url" name="url" class="form-control" placeholder="Enter URL"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Generate Shorten Link</button>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="safe" value="1">
                    <label class="form-checkl">Url is safe</label>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shortLinks as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td><a href="{{ route('shorten.link', $row->short_url) }}"
                               target="_blank">{{ route('shorten.link', $row->short_url) }}</a></td>
                        <td>{{ $row->url }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>