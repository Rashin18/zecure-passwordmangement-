<!DOCTYPE html>
<html>
<head>
    <title>My Passwords</title>
    <style>
        body { font-family: sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
            font-size: 13px;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>My Password Vault - Export</h2>
    <table>
        <thead>
            <tr>
                <th>Website</th>
                <th>Link</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($credentials as $credential)
                <tr>
                    <td>{{ $credential->website }}</td>
                    <td>{{ $credential->link ?? 'N/A' }}</td>
                    <td>{{ $credential->username }}</td>
                    <td>{{ \Illuminate\Support\Facades\Crypt::decryptString($credential->password) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
