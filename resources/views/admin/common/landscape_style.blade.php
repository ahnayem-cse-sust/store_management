@section('styles')
<style>
    @media print {
        @page {
            size: legal landscape;
        }
        ::-webkit-scrollbar {
            display: none;
        }
    }
</style>
@endsection