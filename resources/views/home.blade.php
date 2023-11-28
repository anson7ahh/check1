<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ asset('client/css/index.css') }}">


<body>
    <div class ='create_user'>
        <h2>Create user</h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- @if (!empty($error))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="{{ route('checkLogin') }}" method="post">
        @csrf
        <label for="Name">
            Name:
            <input type="text" name="name" value="{{ old('username') }}">
            {{-- value="{{ old('title') }}> --}}
            @error('name')
                {{-- <span style="color: red">{{ isset($error) ? $error : ' ' }}</span> --}}
            @enderror
        </label>
        <br><br>
        <label for="Email">
            Email:
            <input type="text" name="email" value="{{ old('username') }}" />
            @error('email')
                {{-- <span style="color :
                red">{{ isset($error) ? $error : ' ' }}</span> --}}
            @enderror
        </label><br><br>
        <label for="Password">
            Password:
            <input type="text" name="password"value="{{ old('password') }}">
            @error('password')
                {{-- <span style="color :
        red">{{ $error }}</span> --}}
            @enderror
        </label><br><br>
        <button type="submit">Create user</button>

    </form>


    <form action="{{ route('getuser') }}" method="get">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">username</th>
                    <th scope="col">password</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @if (!@empty($getuser))
                    @foreach ($getuser as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            {{-- <td> {{ $user->id }}</td> --}}
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                {{-- <a href="/users/update/{{ $listuser->id }}">Update</a> <br>

                            <a href="/users/update/{{ $listuser->id }}">delete</a> <br> --}}
                            <td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">ko co ng dung</td>
                    </tr>
                @endif
            </tbody>

        </table>
    </form>


</body>

</html>
