<div class="empty">
    <div class="empty-img"><img src="{{ asset('tabler/static/illustrations/undraw_work_together_h63l.svg') }}" height="128" alt="">
    </div>
    <p class="empty-title">No results found</p>
    <p class="empty-subtitle text-muted">
        Try adjusting your search or filter to find what you're looking for.
    </p>
    @if(isset($link) && $link)
    <div class="empty-action">
        <a href="{{ $link }}" class="btn btn-primary">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            {{ $title }}
        </a>
    </div>
    @endif
</div>
