<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Password Vault - Export</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #111;
        }
        h2 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px 12px;
            text-align: left;
            vertical-align: top;
            word-break: break-word;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #2c3e50;
        }
        tr:nth-child(even) {
            background-color: #fdfdfd;
        }
    </style>
</head>
<body>

    <h2>My Password Vault - Exported Credentials</h2>

    <table>
        <thead>
            <tr>
                <th>Website</th>
                <th>Name</th>
                <th>Link</th>
                <th>Category</th>
                <th>Username / Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @forelse($credentials as $credential)
                <tr>
                    <td>{{ $credential->website }}</td>
                    
                    <td>{{ $credential->name }}</td>
                    <td>
                        @if($credential->link)
                            <a href="{{ $credential->link }}" target="_blank">{{ $credential->link }}</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                                <span class="badge bg-secondary">
                                    {{ $credential->category ?? 'N/A' }}
                                </span>
                    </td>
                    <td>{{ $credential->username }}</td>
                    <td>{{ \Illuminate\Support\Facades\Crypt::decryptString($credential->password) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; color: #888;">No credentials found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
