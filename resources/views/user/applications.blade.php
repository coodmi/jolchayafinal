@extends('layouts')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="mb-0"><i class="fas fa-file-alt me-2"></i>আমার আবেদন সমূহ</h4>
                </div>
                <div class="card-body">
                    @if($applications->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                            <p class="text-muted">আপনার কোনো আবেদন নেই</p>
                            <a href="{{ route('registration.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus me-2"></i>নতুন আবেদন করুন
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>আবেদন নম্বর</th>
                                        <th>ধরন</th>
                                        <th>প্রকল্প/বিবরণ</th>
                                        <th>নাম</th>
                                        <th>মোবাইল</th>
                                        <th>স্ট্যাটাস</th>
                                        <th>তারিখ</th>
                                        <th>অ্যাকশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $app)
                                        <tr>
                                            <td><strong>{{ $app['application_number'] }}</strong></td>
                                            <td>
                                                @if($app['type'] == 'registration')
                                                    <span class="badge bg-primary">রেজিস্ট্রেশন</span>
                                                @else
                                                    <span class="badge bg-info">বুকিং</span>
                                                @endif
                                            </td>
                                            <td>{{ $app['project_name'] }}</td>
                                            <td>{{ $app['applicant_name'] }}</td>
                                            <td>{{ $app['mobile'] }}</td>
                                            <td>
                                                <span class="badge bg-{{ $app['status'] == 'pending' ? 'warning' : ($app['status'] == 'completed' ? 'success' : 'secondary') }}">
                                                    {{ $app['status_bengali'] }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($app['created_at'])->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('user.applications.show', ['type' => $app['type'], 'id' => $app['id']]) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye me-1"></i>বিস্তারিত
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
