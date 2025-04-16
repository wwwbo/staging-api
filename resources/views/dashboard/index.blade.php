<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <a href="{{ route('dashboard.create') }}" class="btn btn-md btn-primary mb-3">Add Student</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Gender</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $data)
                <tr class="align-middle">
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->religion }}</td>
                    <td>{{ $data->gender }}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.show', $data->id) }}" class="btn btn-outline-primary">View</a>
                        <button type="button" class="btn btn-outline-success">Edit</button>
                        <button type="button" class="btn btn-outline-danger">Delete</button>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Students Empty.
                </div>
                @endforelse
            </tbody>
        </table>
        {{ $students->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>