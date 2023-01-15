<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
    <form method="POST" action="/submit" class="submit-form">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
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
