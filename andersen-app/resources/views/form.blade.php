<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
    <form method="POST" action="/submit" class="submit-form">
        @csrf
        <div class="@error('name') is-invalid @enderror">
            <label for="name">Name:</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="name" id="name" required>
        </div>
        <div class="@error('email') is-invalid @enderror">
            <label for="email">Email:</label>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="email" name="email" id="email" required>
        </div>
        <div class="@error('message') is-invalid @enderror">
            <label for="message">Message:</label>
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea name="message" id="message" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
    <div class="container mt-4">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>
    <table class="form-data-table">
        <tbody class="form-data-table-body">
        <tr class="table-header">
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submitted at</th>
        </tr>
        @foreach($formData as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->message }}</td>
                <td>{{ $data->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
        @endif
    </body>
</html>
