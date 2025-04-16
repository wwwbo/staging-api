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
        <br>
        <h3>Add New Student Data</h3>
        <br>
        <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row mb-3">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="inputName" placeholder="Fulan">

                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail3" placeholder="fulan@mail.com">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputReligion" class="col-sm-2 col-form-label">Religion</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" id="inputReligion" placeholder="Islam">

                    @error('religion')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPlaceBirth" class="col-sm-2 col-form-label">Place Of Birth</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" value="{{ old('place_of_birth') }}" id="inputPlaceBirth" placeholder="Bogor">

                    @error('place_of_birth')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputDateOfBirth" class="col-sm-2 col-form-label">Date Of Birth</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" id="inputDateOfBirth" placeholder="1/1/1991">

                    @error('date_of_birth')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" id="inputAddress" placeholder="Jl. KH Fulan">

                    @error('address')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" id="inputPhoneNumber" placeholder="0812 xxxx">

                    @error('phone_number')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="formFile" class="col-sm-2 col-form-label">Choose Photo</label>
                <div class="col-sm-10">
                    <input class="form-control" name="photo" value="{{ old('photo') }}" type="file" id="formFile" accept=".jpg,.jpeg,.png">
                </div>

            </div>

            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridRadios1" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gridRadios1">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridRadios2" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gridRadios2">Female</label>
                    </div>

                    @error('gender')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </fieldset>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>