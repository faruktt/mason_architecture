@extends('frontend.layouts.app')
@section('title', 'Careers | Bjarke Ingels Group')

@section('content')
<style>.careers-layout {
            padding: 0 60px 80px;
        }

        .careers-table {
            width: 100%;
            border-collapse: collapse;
        }

        .careers-table tr {
            border-bottom: 1px solid #e8e8e8;
        }

        .careers-table tr:hover { background: #fafafa; }

        .careers-table td {
            padding: 16px 0;
            font-size: 13px;
            color: #000;
            vertical-align: middle;
        }

        .careers-table td.job-title { font-weight: 400; }

        .careers-table td.job-dept,
        .careers-table td.job-loc {
            font-size: 11px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #999;
            padding-left: 30px;
        }

        .careers-table td.job-arrow {
            text-align: right;
            color: #ccc;
            font-size: 14px;
        }

        .careers-table a {
            text-decoration: none;
            color: inherit;
            display: contents;
        }</style>
<div class="page-big-heading">
    <h1>Careers</h1>
</div>

<div class="careers-layout">

    @if($departments->count())
    <div style="display:flex;gap:24px;margin-bottom:28px;flex-wrap:wrap;">
        <a href="{{ route('careers.index') }}"
           style="font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:#000;text-decoration:none;{{ !request('dept') ? 'border-bottom:1px solid #000;' : 'opacity:.4;' }}">All</a>
        @foreach($departments as $dept)
        <a href="{{ route('careers.index', ['dept'=>$dept]) }}"
           style="font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:#000;text-decoration:none;{{ request('dept')==$dept ? 'border-bottom:1px solid #000;' : 'opacity:.4;' }}">{{ $dept }}</a>
        @endforeach
    </div>
    @endif

    @forelse($careers as $career)
    <a href="{{ route('careers.show', $career->id) }}" style="text-decoration:none;color:inherit;display:block;">
        <table class="careers-table" style="width:100%;border-collapse:collapse;">
            <tr>
                <td class="job-title" style="padding:16px 0;font-size:13px;border-bottom:1px solid #e8e8e8;width:40%;">{{ $career->title }}</td>
                <td class="job-dept" style="padding:16px 0 16px 30px;font-size:11px;letter-spacing:.05em;text-transform:uppercase;color:#999;border-bottom:1px solid #e8e8e8;width:25%;">{{ $career->department }}</td>
                <td class="job-loc" style="padding:16px 0 16px 30px;font-size:11px;letter-spacing:.05em;text-transform:uppercase;color:#999;border-bottom:1px solid #e8e8e8;width:25%;">{{ $career->location }}</td>
                <td class="job-arrow" style="padding:16px 0;text-align:right;color:#ccc;border-bottom:1px solid #e8e8e8;">→</td>
            </tr>
        </table>
    </a>
    @empty
    <div class="empty-msg" style="padding:60px 0;">No open positions at the moment.</div>
    @endforelse

</div>

@endsection