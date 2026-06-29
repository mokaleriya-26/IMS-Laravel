<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Academic Achievements Report – {{ $user->name }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; margin: 30px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #005F5B; padding-bottom: 20px; }
        .header h1 { color: #005F5B; margin: 0; font-size: 24px; }
        .student-info { margin-bottom: 20px; display: grid; grid-template-cols: 1fr 1fr; gap: 10px; font-size: 14px; }
        .student-info div { margin-bottom: 5px; }
        .student-info span { font-weight: bold; color: #555; }
        table { w-full: 100%; width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-size: 12px; }
        th { bg-color: #f5f5f5; background-color: #005F5B; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .status-badge { font-weight: bold; border-radius: 4px; padding: 3px 6px; text-transform: uppercase; font-size: 10px; }
        .approved { background-color: #e6f4ea; color: #137333; }
        .pending { background-color: #fef7e0; color: #b06000; }
        .rejected { background-color: #fce8e6; color: #c5221f; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px; text-align: right;">
        <button onclick="window.print()" style="background-color: #005F5B; color: white; border: none; padding: 10px 20px; font-weight: bold; border-radius: 6px; cursor: pointer;">🖨 Print / Save as PDF</button>
        <button onclick="window.close()" style="background-color: #ccc; border: none; padding: 10px 20px; font-weight: bold; border-radius: 6px; cursor: pointer; margin-left: 10px;">Close Window</button>
    </div>
    
    <div class="header">
        <h1>EduStream IMS – Academic Achievements Report</h1>
        <p style="margin: 5px 0 0 0; color: #666; font-size: 14px;">Official Student Credentials Record</p>
    </div>

    <div class="student-info">
        <div><span>Student Name:</span> {{ $user->name }}</div>
        <div><span>Roll Number:</span> {{ optional($user->studentProfile)->roll_number ?? 'N/A' }}</div>
        <div><span>Branch:</span> {{ optional($user->studentProfile)->branch ?? 'N/A' }}</div>
        <div><span>Current Year:</span> Year {{ optional($user->studentProfile)->year_of_study ?? 'N/A' }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Submitted On</th>
                <th>Category</th>
                <th>Title</th>
                <th>Academic Year</th>
                <th>Organization</th>
                <th>Award Status</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($achievements as $a)
            <tr>
                <td>{{ $a->created_at->format('Y-m-d') }}</td>
                <td>{{ $a->category }}</td>
                <td>{{ $a->title }}</td>
                <td>{{ $a->academic_year ?? 'N/A' }}</td>
                <td>{{ $a->organization_name ?? 'N/A' }}</td>
                <td>{{ $a->award_status ?? 'N/A' }}</td>
                <td>
                    <span class="status-badge {{ strtolower($a->status) }}">
                        {{ $a->status }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; color: #999;">No achievement records logged matching criteria.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 50px; font-size: 11px; color: #999; text-align: center;">
        Report generated on {{ now()->format('F d, Y \a\t h:i A') }} &copy; EduStream IMS
    </div>

    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>
