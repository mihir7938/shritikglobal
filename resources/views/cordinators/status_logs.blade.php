<div class="border border-primary d-inline-block px-2 py-1 mb-3">
    <span class="mx-2">{{ $customer->fullName }}</span>-<span class="mx-2">{{ $customer->mobile }}</span>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>*</th>
                <th width="180">Loan Status</th>
                <th>Remarks</th>
                <th width="170">Date Added</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $key => $log)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        @php
                            switch($log->status){
                                case 'Office':
                                    $badge = 'badge-secondary';
                                    break;

                                case 'Forward to Bank':
                                    $badge = 'badge-info';
                                    break;

                                case 'Login':
                                    $badge = 'badge-primary';
                                    break;

                                case 'PD/Visit':
                                    $badge = 'badge-warning';
                                    break;

                                case 'Sanction':
                                    $badge = 'badge-success';
                                    break;

                                case 'Agreement':
                                    $badge = 'badge-dark';
                                    break;

                                case 'Disbursement':
                                    $badge = 'badge-success';
                                    break;

                                case 'Closed':
                                    $badge = 'badge-success';
                                    break;

                                case 'Reject':
                                    $badge = 'badge-danger';
                                    break;

                                case 'Return':
                                    $badge = 'badge-warning';
                                    break;

                                default:
                                    $badge = 'badge-secondary';
                            }
                        @endphp
                        @if($log->status)
                            <span class="badge {{ $badge }} px-2 py-1">
                                {{ $log->status }}
                            </span>
                        @endif
                    </td>
                    <td>{{ $log->remarks }}</td>
                    <td>{{ $log->created_at->format('d M Y h:i A') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No status logs found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>