@push('preview-title')
    Preview | {{ $template->title }}
@endpush

<div class='embed-container'>
    <iframe src='{{ $template->preview }}' style='border:0;'></iframe>
</div>
