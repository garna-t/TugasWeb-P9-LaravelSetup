<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Blog CRUD Laravel</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #64748b;
            --warning: #f59e0b;
            --danger: #dc2626;
            --success: #16a34a;
            --info: #0284c7;
            --bg: #f1f5f9;
            --surface: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0.9rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .nav-links a {
            padding: 0.45rem 0.9rem;
            border-radius: 8px;
            font-weight: 500;
            color: var(--muted);
        }

        .nav-links a:hover {
            background: var(--bg);
            color: var(--primary);
        }

        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1.25rem;
            flex: 1;
        }

        .footer {
            text-align: center;
            padding: 1.5rem 1rem;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .btn {
            display: inline-block;
            padding: 0.55rem 1.1rem;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            text-align: center;
            color: #ffffff;
            transition: background 0.15s ease, transform 0.15s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-sm {
            padding: 0.35rem 0.8rem;
            font-size: 0.85rem;
        }

        .btn-primary {
            background: var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: var(--secondary);
        }

        .btn-secondary:hover {
            background: #475569;
        }

        .btn-warning {
            background: var(--warning);
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-danger {
            background: var(--danger);
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 1.25rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.4rem;
            display: flex;
            flex-direction: column;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 0.35rem;
            word-break: break-word;
        }

        .card-date {
            font-size: 0.82rem;
            color: var(--muted);
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: #475569;
            margin-bottom: 1.25rem;
            flex: 1;
            word-break: break-word;
        }

        .card-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .card-actions form {
            display: inline;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.75rem;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.4rem;
        }

        .form-control {
            width: 100%;
            padding: 0.7rem 0.9rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            color: var(--text);
            background: #ffffff;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        textarea.form-control {
            min-height: 220px;
            resize: vertical;
        }

        .field-error {
            color: var(--danger);
            font-size: 0.87rem;
            margin-top: 0.35rem;
        }

        .form-actions {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .alert {
            padding: 0.9rem 1.1rem;
            border-radius: 10px;
            margin-bottom: 1.25rem;
            border: 1px solid transparent;
            font-weight: 500;
        }

        .alert-success {
            background: #dcfce7;
            border-color: #86efac;
            color: #166534;
        }

        .alert-error,
        .alert-danger {
            background: #fee2e2;
            border-color: #fca5a5;
            color: #991b1b;
        }

        .alert-info {
            background: #e0f2fe;
            border-color: #7dd3fc;
            color: #075985;
        }

        .empty {
            text-align: center;
            padding: 3rem 1.5rem;
            background: var(--surface);
            border: 2px dashed #cbd5e1;
            border-radius: 14px;
            color: var(--muted);
        }

        .empty h2 {
            color: var(--text);
            margin-bottom: 0.4rem;
        }

        .post-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            word-break: break-word;
        }

        .post-meta {
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .post-body {
            white-space: pre-line;
            word-break: break-word;
            font-size: 1.05rem;
            margin-bottom: 2rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.35rem;
            list-style: none;
            margin-top: 2rem;
        }

        .pagination .page-link {
            display: block;
            padding: 0.5rem 0.9rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface);
            color: var(--primary);
            font-weight: 500;
        }

        .pagination a.page-link:hover {
            background: var(--primary);
            color: #ffffff;
        }

        .pagination .active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
        }

        .pagination .disabled .page-link {
            color: #94a3b8;
            background: #f8fafc;
        }

        @media (max-width: 600px) {
            .page-title {
                font-size: 1.4rem;
            }

            .post-title {
                font-size: 1.5rem;
            }

            .panel {
                padding: 1.25rem;
            }

            .navbar-inner {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('posts.index') }}" class="brand">Blog CRUD Laravel</a>
            <div class="nav-links">
                <a href="{{ route('posts.index') }}">Semua Post</a>
                <a href="{{ route('posts.create') }}">Tambah Post</a>
            </div>
        </div>
    </nav>

    <main class="container">
        @if (session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif

        @if (session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        TugasWeb-P10-BlogCRUD &middot; Pemrograman Web Pertemuan 10
    </footer>
</body>
</html>
