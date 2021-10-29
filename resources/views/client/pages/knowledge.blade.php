@extends('client.layouts.master')

@section('title')
    <title>Kiến thức chung</title>
    <meta name="keywords" content="Kiến thức chung" />
    <meta name="description" content="Kiến thức chung - {{ $nameCate }}" />
    <meta name="news_keywords" content="Kiến thức chung" />
    <meta property="og:title" content="Kiến thức chung" />
    <meta property="og:description" content="Kiến thức chung - {{ $nameCate }}" />
    <meta property="og:image" content="{{ url($banner->image) }}" />
    <meta property="og:url" itemprop="url" content="" />
    <meta property="og:type" content="website" />
    <meta itemprop="name" content="Kiến thức chung" />
    <meta itemprop="description" content="Kiến thức chung - {{ $nameCate }}" />
    <meta itemprop="image" content="{{ url($banner->image) }}" />
    <!-- Og Image -->
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="Kiến thức chung" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/knowledge.css') }}">
@endsection

@section('content')

    <!-- quote -->
    <div class="container p-xs-0 d-none d-sm-block">
        <img src="{{ url($banner->image) }}" width="100%" alt="{{ $banner->name }}" class="banner-quote">
    </div>

    <!-- tab content main -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabset">
                        @foreach ($cateKnowledges as $cateKnowledge)
                            <input type="radio" name="tabset"
                                {{ $idCategoryKnowledge == $cateKnowledge->id ? 'checked' : '' }}>
                            <label
                                onclick="window.location.href='{{ route('client.knowledge.index', $cateKnowledge->id) }}'">{{ $cateKnowledge->name }}</label>
                        @endforeach

                        <div class="form-group select-cate d-block d-sm-none">
                            <label for="select-cate">Chọn danh mục</label>
                            <select class="form-control" id="select-cate"
                                onchange="top.location.href = this.options[this.selectedIndex].value">
                                @foreach ($cateKnowledges as $cateKnowledge)
                                    <option value="{{ route('client.knowledge.index', $cateKnowledge->id) }}"
                                        {{ $idCategoryKnowledge == $cateKnowledge->id ? 'selected' : '' }}>
                                        {{ $cateKnowledge->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="tab-panels">
                            <section id="list-blog" class="tab-panel">
                                <section class="list-blog">
                                    <div class="row blogs">
                                        @if ($knowledges->total() > 0)
                                            @foreach ($knowledges as $key => $knowledge)
                                                <div class="col-md-3 blog {{ $key == 0 ? 'post-newest' : '' }}">
                                                    <div class="card"
                                                        onclick="window.location.href='{{ route('client.knowledgeDetail', [$knowledge->slug, $knowledge->id]) }}'">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-12 wp-thumbnail {{ $key != 0 ? 'col-5' : '' }}">
                                                                <img class="card-img-top"
                                                                    src="{{ url($knowledge->thumbnail) }}"
                                                                    alt="{{ url($knowledge->thumbnail) }}">
                                                            </div>
                                                            <div
                                                                class="col-md-12 wp-text {{ $key != 0 ? 'col-7' : '' }}">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><a
                                                                            href="{{ route('client.knowledgeDetail', [$knowledge->slug, $knowledge->id]) }}"
                                                                            class="text-decoration-none"
                                                                            title="{{ $knowledge->title }}">{{ $knowledge->title }}</a>
                                                                    </h5>
                                                                    <p
                                                                        class="card-text mb-0 {{ $key == 0 ? '' : 'd-none d-sm-block' }}">
                                                                        {!! $knowledge->description !!}
                                                                    </p>
                                                                    <div class="time-view d-block d-sm-none">
                                                                        <span
                                                                            class="post-on">{{ date('d/m/Y', strtotime($knowledge->created_at)) }}
                                                                        </span>
                                                                        <span class="post-on">-
                                                                            {{ $knowledge->num_view }} lượt xem</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="mb-0 text-center w-100">Đang cập nhật bài viết...</p>
                                        @endif

                                    </div>
                                    <!-- pagination -->
                                    <div class="text-center d-flex justify-content-center">
                                        {{ $knowledges->links() }}
                                    </div>
                                </section>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
