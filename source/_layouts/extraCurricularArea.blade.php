@extends('_layouts.standard')
@section('title', $page->title)
@section('content')
    <h1 class="decorated py-3 mb-4">{{ $page->title }}</h1>

    <ul class="nav">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/curriculum/extracurricular/">Extracurricular</a>
                </li>
            </ol>
        </nav>
    </ul>


    @if ($page->image)
        <a href="{{ $page->image }}" @if ($page->image_title) title="{{ $page->image_title }}" @endif
            @if ($page->image_alt) alt="{{ $page->image_alt }}" @endif class="featured">
            <img class="featured-image"
                style="object-fit: cover; max-width:100%; display: block; object-fit: contain; max-width: 100%; display: block;"
                src="{{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/', $page->image) }}"
                srcset="
            {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,h_400,c_lfill,g_auto/', $page->image) }}
            "
                alt="" style="max-width: 100%">
        </a>
        @if ($page->image_credit)
            <div class="image-credit">
                <em>Photo / {{ $page->image_credit }}</em>
            </div>
        @endif

    @endif

    @yield('postContent')


    @foreach ($extracurricular_activities->where('extracurricular_area', $page->title) as $ec_activity)
        <details>
            <summary>
                <h2 class='d-table decorated mt-5 mb-2'>{{ $ec_activity->title }}</h2>
            </summary>
            @if ($ec_activity->image)
                <img src="{{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/', $page->featureImageSrc($ec_activity)) }}"
                    srcset="
            {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_950,h_300,c_lfill,g_auto/', $page->featureImageSrc($ec_activity)) }} 950w,
            {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/q_auto,f_auto,w_500,h_300,c_lfill,g_auto/', $page->featureImageSrc($ec_activity)) }} 500w
            "
                    sizes="(min-width: 800px) 950px, 500px" alt="" style="max-width: 100%">
            @endif

            <table>
                <thead>
                </thead>
                <tbody>
                    @if ($ec_activity->people)
                        @php
                            $involvedStaff = collect($ec_activity->people)
                                ->map(function ($person) use ($staff) {
                                    return [
                                        'person' => $staff->firstWhere('title', $person['name']),
                                        'role' => $person['role'],
                                    ];
                                })
                                ->filter(function ($st) {
                                    return !is_null($st['person']);
                                });
                        @endphp
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                        @foreach ($involvedStaff as $involved)
                            <tr>
                                <td>{{ $involved['person']['title'] }}</td>
                                <td>{{ $involved['role'] }}</td>
                                <td>{{ isset($involved['person']['phone']) ? $involved['person']->phone : '' }}</td>
                                <td>{{ isset($involved['person']['email']) ? $involved['person']->email : '' }}</td>
                            </tr>
                        @endforeach
                    @endif

                    @if ($ec_activity->cost)
                        <tr>
                            <th>Cost</th>
                            <td colspan="3"> {{ $ec_activity->cost }}</td>
                        </tr>
                    @endif

                    @if ($ec_activity->terms)
                        <tr>
                            <th>
                                When
                            </th>
                            <td colspan="3">
                                @foreach ($ec_activity->terms as $term)
                                    {{ $term }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endif

                    @if ($ec_activity->uniform)
                        <tr>
                            <th>Uniform/Equipment</th>
                            <td colspan="3">{{ $ec_activity->uniform }}</td>
                        </tr>
                    @endif


                </tbody>
            </table>

            {!! $ec_activity !!}
        </details>
    @endforeach

    @php
        $recentNews = $news
            ->filter(function ($article) use ($page) {
                return in_array($page->title, $article->extracurricular_areas ?? []);
            })
            ->take(6);
    @endphp
    @if (count($recentNews))

        <h3>Recently in the news</h3>
        <div class="row">
            @foreach ($recentNews as $n)
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a href="{{ $n->getPath() }}">
                        <img src="{{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/', $page->featureImageSrc($n)) }}"
                            srcset="
        {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_400,h_360/', $page->featureImageSrc($n)) }} 400w,
        {{ str_replace('https://res.cloudinary.com/whanganuihigh/image/upload/', 'https://res.cloudinary.com/whanganuihigh/image/upload/c_fill,g_face,q_80,w_250,h_170/', $page->featureImageSrc($n)) }} 250w
        "
                            sizes="(min-width: 800px) 400px, 250px" width="600"
                            alt="{{ $page->featureImageAlt($n) ?: '' }}" title="{{ $page->featureImageDescription($n) }}"
                            style="max-width: 100%">
                        {{ $n->title }}</a>
                </div>
            @endforeach
        </div>
    @endif

    @include('_partials.lastReviewed')

@endsection
