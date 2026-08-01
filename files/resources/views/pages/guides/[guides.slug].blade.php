{{-- Dynamic page: one URL per entry of resources/data/collections/guides.json, matched on `slug` — $guides is the entry. Add an entry there to publish; its `content` HTML is the body. --}}
<x-layouts.guide
    :title="$guides->title"
    :description="$guides->description"
    :category="$guides->category"
    :date="$guides->date"
    :readTime="$guides->readTime"
    :author="$guides->author"
    :authorRole="$guides->authorRole"
    :authorImage="$guides->authorImage">

    {!! $guides->content !!}

</x-layouts.guide>
