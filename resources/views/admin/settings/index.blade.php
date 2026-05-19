@extends('admin.layouts.app')
@section('page-title', 'Site Settings')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><span class="card-title"><i class="bi bi-gear-fill me-2"></i>General Settings</span></div>
            <div class="card-body">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Site Name</label>
                            <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? '' }}" placeholder="BIG | Bjarke Ingels Group">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="site_tagline" class="form-control" value="{{ $settings['site_tagline'] ?? '' }}" placeholder="Architecture, Landscape, Engineering...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Email</label>
                            <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone (Copenhagen)</label>
                            <input type="text" name="phone_cph" class="form-control" value="{{ $settings['phone_cph'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Copenhagen Address</label>
                            <input type="text" name="address_cph" class="form-control" value="{{ $settings['address_cph'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">New York Address</label>
                            <input type="text" name="address_ny" class="form-control" value="{{ $settings['address_ny'] ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">London Address</label>
                            <input type="text" name="address_london" class="form-control" value="{{ $settings['address_london'] ?? '' }}">
                        </div>
                    </div>
                    <div class="mt-4 pt-3" style="border-top:1px solid #eee;">
                        <button type="submit" class="btn btn-accent px-4"><i class="bi bi-check-lg me-1"></i> Save Settings</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header"><span class="card-title"><i class="bi bi-person-fill me-2"></i>Admin Account</span></div>
            <div class="card-body" style="font-size:14px;color:#555;">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p class="mt-2"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p class="mt-2"><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</p>
                <p class="mt-3" style="font-size:12px;color:#aaa;">To change your password, use the database or tinker.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><span class="card-title">Quick Info</span></div>
            <div class="card-body" style="font-size:13px;color:#666;line-height:1.8;">
                <p><i class="bi bi-circle-fill me-2" style="color:#10b981;font-size:8px;"></i>Laravel {{ app()->version() }}</p>
                <p><i class="bi bi-circle-fill me-2" style="color:#3b5bdb;font-size:8px;"></i>PHP {{ PHP_VERSION }}</p>
                <p><i class="bi bi-circle-fill me-2" style="color:#f59e0b;font-size:8px;"></i>Bootstrap 5.3</p>
                <hr>
                <p style="font-size:12px;">Settings are stored in the database and can be retrieved anywhere with <code>Setting::get('key')</code>.</p>
            </div>
        </div>
    </div>
</div>
@endsection
