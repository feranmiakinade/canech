<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>CANECH Admin — Enquiries</title>
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700;800&display=swap" rel="stylesheet">
 
    <style>
        :root {
            --bg: #F7F7F5;
            --text: #0e0e0f;
            --muted: #6a6a66;
            --accent: #B6FF00;
            --line: #E6E6E2;
            --line-strong: #D2D2CD;
            --glass-bg: rgba(255,255,255,0.7);
            --glass-border: rgba(14,14,15,0.08);
            --glass-highlight: rgba(255,255,255,0.9);
            box-sizing: border-box;
        }
 
        *, *::before, *::after { box-sizing: inherit; }
        * { margin: 0; padding: 0; }
 
        body {
            font-family: 'Inter Tight', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            padding: 48px 32px;
        }
 
        a { color: inherit; }
        :focus-visible { outline: 2px solid var(--text); outline-offset: 2px; }
 
        .admin-container {
            max-width: 1240px;
            margin: 0 auto;
        }
 
        /* ---------- HEADER ---------- */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 36px;
        }
        .brand {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 0.14em;
        }
        .brand span { color: var(--accent); -webkit-text-stroke: 0.5px var(--text); }
        .subtitle {
            margin-top: 6px;
            color: var(--muted);
            font-size: 13.5px;
            letter-spacing: 0.3px;
        }
 
        .header-actions { display: flex; align-items: center; gap: 10px; }
 
        .search {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            box-shadow: inset 0 1px 0 var(--glass-highlight);
        }
        .search input {
            border: none;
            background: none;
            outline: none;
            font: inherit;
            font-size: 13.5px;
            width: 180px;
            color: var(--text);
        }
        .search input::placeholder { color: #9a9a95; }
 
        .btn-export {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            background: var(--text);
            color: var(--accent);
            border: 1px solid var(--text);
            border-radius: 2px;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: opacity .15s ease;
        }
        .btn-export:hover { opacity: 0.85; }
 
        /* ---------- STATS ---------- */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            padding: 22px 24px;
            -webkit-backdrop-filter: blur(14px) saturate(150%);
            backdrop-filter: blur(14px) saturate(150%);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
        }
        .stat-label {
            color: var(--muted);
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        .stat-number { font-size: 30px; font-weight: 800; letter-spacing: -0.02em; }
        .stat-number.small { font-size: 20px; }
 
        /* ---------- FILTER BAR ---------- */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }
        .filter-chip {
            padding: 7px 14px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--muted);
            background: rgba(255,255,255,0.6);
            border: 1px solid var(--glass-border);
            border-radius: 999px;
            text-decoration: none;
            transition: background .15s ease, color .15s ease, border-color .15s ease;
        }
        .filter-chip:hover { border-color: var(--text); color: var(--text); }
        .filter-chip.active { background: var(--accent); color: var(--text); border-color: var(--text); }
 
        /* ---------- TABLE CARD ---------- */
        .table-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            overflow: hidden;
            -webkit-backdrop-filter: blur(14px) saturate(150%);
            backdrop-filter: blur(14px) saturate(150%);
            box-shadow: inset 0 1px 0 var(--glass-highlight);
        }
 
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 20px 24px;
            border-bottom: 1px solid var(--line);
        }
        .table-header h2 { font-size: 16px; font-weight: 700; letter-spacing: -0.01em; }
        .table-header .count { font-size: 13px; color: var(--muted); }
 
        .table-wrapper { overflow-x: auto; }
 
        table { width: 100%; border-collapse: collapse; }
 
        th, td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid var(--line);
            white-space: nowrap;
        }
        th {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--muted);
            background: rgba(255,255,255,0.5);
        }
        td { font-size: 14px; }
        tr:last-child td { border-bottom: none; }
        tbody tr { transition: background .15s ease; }
        tbody tr:hover { background: rgba(255,255,255,0.55); }
 
        .cell-name { font-weight: 600; }
        .cell-email,
        .cell-message { max-width: 260px; overflow: hidden; text-overflow: ellipsis; }
        .cell-muted { color: var(--muted); }
 
        .service {
            display: inline-block;
            background: var(--accent);
            padding: 5px 11px;
            border-radius: 999px;
            font-size: 11.5px;
            font-weight: 700;
            white-space: nowrap;
        }
 
        .budget-pill {
            display: inline-block;
            padding: 5px 11px;
            border: 1px solid var(--line-strong);
            border-radius: 999px;
            font-size: 11.5px;
            font-weight: 600;
            color: var(--muted);
            white-space: nowrap;
        }
 
        .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 13px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text);
            background: none;
            border: 1px solid var(--line-strong);
            border-radius: 2px;
            text-decoration: none;
            cursor: pointer;
            transition: border-color .15s ease, background .15s ease;
        }
        .btn-view:hover { border-color: var(--text); background: var(--accent); }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 13px;
            font-size: 12.5px;
            font-weight: 600;
            color: #b3261e;
            background: none;
            border: 1px solid #d9aaa7;
            border-radius: 2px;
            cursor: pointer;
            transition: border-color .15s ease, background .15s ease, color .15s ease;
        }

        .btn-delete:hover {
            border-color: #b3261e;
            background: #b3261e;
            color: #fff;
        }
 
        .empty {
            padding: 70px 20px;
            text-align: center;
            color: var(--muted);
        }
        .empty p:first-child { font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 6px; }
        .empty p:last-child { font-size: 13px; }
 
        /* ---------- MESSAGE DETAIL (expandable row) ---------- */
        .msg-row td {
            padding: 0;
            border-bottom: 1px solid var(--line);
        }
        .msg-row.is-collapsed { display: none; }
        .msg-body {
            padding: 18px 24px 22px;
            background: rgba(255,255,255,0.45);
            font-size: 13.5px;
            line-height: 1.6;
            color: #3a3a37;
            white-space: normal;
        }
        .msg-body strong { color: var(--text); }
 
        /* pagination, if the controller paginates */
        .pagination-wrap {
            padding: 18px 24px;
            border-top: 1px solid var(--line);
        }
 
        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 900px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
        }
 
        @media (max-width: 700px) {
            body { padding: 28px 18px; }
            .header { align-items: flex-start; }
            .header-actions { width: 100%; }
            .search { flex: 1; }
            .search input { width: 100%; }
            .stats { grid-template-columns: 1fr; }
            .brand { font-size: 19px; }
        }
        .header-actions {
    display: flex;
    align-items: center;
    gap: 10px;
        }

        .logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border: 1px solid var(--line-strong);
            border-radius: 2px;
            background: none;
            color: var(--text);
            font: inherit;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: border-color .15s ease, background .15s ease, color .15s ease;
        }
        .logout-btn:hover {
            border-color: #b3261e;
            background: rgba(179,38,30,0.08);
            color: #7d1a15;
        }
    </style>
</head>
 
<body>
 
<div class="admin-container">
 
    <div class="header">
    <div>
        <div class="brand">CANECH<span>.</span></div>
        <div class="subtitle">Project enquiries</div>
    </div>

    <div class="header-actions">
        <form method="GET" class="search" role="search">
            <span aria-hidden="true">🔍</span>
            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Search by name or email"
            >
        </form>

        @if(isset($exportUrl))
            <a href="{{ $exportUrl }}" class="btn-export">Export CSV</a>
        @endif

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>
 
    <div class="stats">
 
        <div class="stat-card">
            <div class="stat-label">Total enquiries</div>
            <div class="stat-number">{{ $submissions->count() }}</div>
        </div>
 
        <div class="stat-card">
            <div class="stat-label">This week</div>
            <div class="stat-number">
                {{ $submissions->where('created_at', '>=', now()->subDays(7))->count() }}
            </div>
        </div>
 
        <div class="stat-card">
            <div class="stat-label">Latest enquiry</div>
            <div class="stat-number small">
                {{ $submissions->first() ? $submissions->first()->created_at->format('d M, g:ia') : '—' }}
            </div>
        </div>
 
        <div class="stat-card">
            <div class="stat-label">Project types</div>
            <div class="stat-number">{{ $submissions->unique('project_type')->count() }}</div>
        </div>
 
    </div>
 
    @if($submissions->count())
        <div class="filter-bar">
            <a href="{{ request()->fullUrlWithQuery(['project_type' => null]) }}"
               class="filter-chip {{ request('project_type') ? '' : 'active' }}">
                All
            </a>
            @foreach($submissions->unique('project_type')->pluck('project_type') as $type)
                <a href="{{ request()->fullUrlWithQuery(['project_type' => $type]) }}"
                   class="filter-chip {{ request('project_type') === $type ? 'active' : '' }}">
                    {{ $type }}
                </a>
            @endforeach
        </div>
    @endif
 
    <div class="table-card">
 
        <div class="table-header">
            <h2>Customer enquiries</h2>
            <span class="count">{{ $submissions->count() }} total</span>
        </div>
 
        @if($submissions->count())
 
            <div class="table-wrapper">
 
                <table>
 
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Budget</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
 
                    <tbody>
 
                        @foreach($submissions as $submission)
 
                            <tr>
 
                                <td class="cell-name">{{ $submission->name }}</td>
 
                                <td>
                                    <span class="service">{{ $submission->project_type }}</span>
                                </td>
 
                                <td>
                                    @if($submission->budget)
                                        <span class="budget-pill">{{ $submission->budget }}</span>
                                    @else
                                        <span class="cell-muted">—</span>
                                    @endif
                                </td>
 
                                <td class="cell-email">
                                    <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a>
                                </td>
 
                                <td class="cell-muted">
                                    {{ $submission->created_at->format('d M Y') }}
                                </td>
 
                                <td>
    <div style="display: flex; gap: 8px; align-items: center;">

        <button type="button"
                class="btn-view"
                data-toggle-msg="msg-{{ $submission->id }}">
            View message
        </button>

        <form method="POST"
              action="{{ route('admin.submissions.destroy', $submission->id) }}"
              onsubmit="return confirm('Are you sure you want to delete this enquiry? This cannot be undone.');">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn-delete">
                Delete
            </button>
        </form>

    </div>
</td>
 
                            </tr>
 
                            <tr class="msg-row is-collapsed" id="msg-{{ $submission->id }}">
                                <td colspan="6">
                                    <div class="msg-body">
                                        <strong>Project details:</strong><br>
                                        {{ $submission->message }}
                                    </div>
                                </td>
                            </tr>
 
                        @endforeach
 
                    </tbody>
 
                </table>
 
            </div>
 
            @if(method_exists($submissions, 'links'))
                <div class="pagination-wrap">
                    {{ $submissions->links() }}
                </div>
            @endif
 
        @else
 
            <div class="empty">
                <p>No enquiries yet.</p>
                <p>Customer enquiries will appear here when someone submits the form.</p>
            </div>
 
        @endif
 
    </div>
 
</div>
 
<script>
    document.querySelectorAll('[data-toggle-msg]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var row = document.getElementById(btn.getAttribute('data-toggle-msg'));
            if (!row) return;
            var collapsed = row.classList.toggle('is-collapsed');
            btn.textContent = collapsed ? 'View message' : 'Hide message';
        });
    });
</script>
 
</body>
</html>