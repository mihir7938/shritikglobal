<div class="border border-primary d-inline-block px-2 py-1 mb-3">
    <span class="mx-2">{{ $call->customer_name }}</span>-<span class="mx-2">{{ $call->customer_mobile }}</span>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>*</th>
                <th width="180">Follow Up Date</th>
                <th>Follow Up Remarks</th>
                <th width="170">Date Added</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $key => $log)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ Carbon\Carbon::parse($log->followup_date)->format('d M, Y') }}</td>
                    <td>{{ $log->followup_remarks }}</td>
                    <td>{{ $log->created_at->format('d M Y h:i A') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No follow up logs found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>