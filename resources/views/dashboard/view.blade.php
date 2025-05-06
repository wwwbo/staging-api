<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <a href="{{ route('dashboard.index') }}" class="btn btn-md btn-primary mb-3">Back</a>
        <a href="{{ route('dashboard.edit', $student->id) }}" class="btn btn-md btn-success mb-3">Update</a>
        <br>
        <div class="card mb-3">
            <div class="card-body d-flex flex-row gap-4">
                <div class="img-content">
                    <img src="{{ asset($student->photo_url) }}"
                        style="width: 15rem; height: 15rem; border-radius: 50% !important; box-shadow: 0px 0px 0px 3px #046aff; object-fit: cover;">
                </div>
                <div class="w-100">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex flex-column">
                            <strong>Name</strong>
                            <span>{{ $student->name }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <strong>Email</strong>
                            <span>{{ $student->email }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <strong>Gender</strong>
                            <span>{{ $student->gender }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <strong>Religion</strong>
                            <span>{{ $student->religion }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <strong>Place Of Birth</strong>
                            <span>{{ $student->place_of_birth }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <strong>Date Of Birth</strong>
                            <span>{{ $student->date_of_birth }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <strong>Address</strong>
                            <span>{{ $student->address }}</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <strong>Phone Number</strong>
                            <span>{{ $student->phone_number }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>