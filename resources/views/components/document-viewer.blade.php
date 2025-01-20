@props(['path', 'type'])

@php
    $mimeType = Storage::mimeType($path);
    $isOffice = in_array($mimeType, [
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.oasis.opendocument.text'
    ]);
@endphp

@if(str_contains($mimeType, 'pdf'))
    <iframe src="{{ route('admin.applications.preview', ['application' => $application->id, 'type' => $type]) }}"
            class="w-100" style="height: 80vh;" frameborder="0"></iframe>
@elseif($isOffice)
    <div class="document-preview">
        <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode(url(Storage::url($path))) }}"
                class="w-100" style="height: 80vh;" frameborder="0"></iframe>
    </div>
@else
    <div class="alert alert-info">
        This file type cannot be previewed directly. Please use the download option.
    </div>
@endif
