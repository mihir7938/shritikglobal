<div class="border border-primary d-inline-block px-2 py-1 mb-3">
    <span class="mx-2">{{ $customer->fullName }}</span>-<span class="mx-2">{{ $customer->mobile }}</span>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>*</th>
                <th width="120">Bank Name</th>
                <th width="180">Bank Associate Name</th>
                <th width="200">Bank Associate Mobile</th>
                <th>Remarks</th>
                <th width="120">Date Added</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $key => $log)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $log->bankName }}</td>
                    <td>{{ $log->bankAssocName }}</td>
                    <td>{{ $log->bankAssocMobile }}</td>
                    <td>{{ $log->bankRemarks }}</td>
                    <td>{{ \Carbon\Carbon::parse($log->bankUpdateDate)->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        File is not transferred to any bank.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>