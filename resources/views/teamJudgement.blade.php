@extends('basic.main')

@section('title', '選擇隊伍難度')

@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-title">選擇隊伍難度</h1>
                    <p>過去隊伍難度的評分紀錄。</p>
                </div>
                <div class="col-lg-12">
                    <form method="GET" action="{{ route('teamJudgement') }}">
                        <div class="mb-3">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="搜尋隊伍名稱">
                        </div>
                    </form>
                    <form method="POST" action="{{ route('teamJudgement.store') }}" id="selectionForm">
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>選擇</th>
                                <th>隊伍名稱</th>
                                <th>難度</th>
                                <th>更新時間</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($judgements as $judgement)
                                <tr>
                                    <td>
                                        <input type="radio" name="selected" value="{{ $judgement->id }}">
                                    </td>
                                    <td>{{ $judgement->name }}</td>
                                    <td>{{ $judgement->result_level }}</td>
                                    <td>{{ $judgement->updated_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">提交選擇</button> <!-- 使用 mb-2 類 -->
                        <a href="http://localhost/judgement" class="btn btn-secondary" target="_blank">自行評分</a> <!-- 使用 mb-2 類 -->
                    </form>
                    <!-- 分頁置中 -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $judgements->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
