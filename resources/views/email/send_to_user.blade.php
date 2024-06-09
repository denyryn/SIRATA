@if (str_contains(strtolower($data_status_terakhir), 'disetujui'))
    @include('email.template.disetujui')
@elseif(str_contains(strtolower($data_status_terakhir), 'ditolak'))
    @include('email.template.ditolak')
@endif

