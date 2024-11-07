@section('styles')
<style>
    @media print {
        @page {
            size: A4 portrait;
        }
        ::-webkit-scrollbar {
            display: none;
        }
    }
</style>
@endsection