@extends('layouts.app')

@section('content')
    <h1>Список постов</h1>

    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            @if($post->getFirstMedia('images'))
                <img src="{{ $post->getFirstMediaUrl('images') }}" alt="Изображение поста" style="max-width: 100%;">
            @endif
            <p>{{ $post->content }}</p>
            <button onclick="toggleCommentForm({{ $post->id }})">Добавить комментарий</button>
            <div id="comment-form-{{ $post->id }}" style="display: none;">
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <textarea name="content" rows="3" placeholder="Введите ваш комментарий" required></textarea>
                    <button type="submit">Отправить</button>
                </form>
            </div>
        </div>
    @endforeach

    @if($posts->isEmpty())
        <p>Нет доступных постов.</p>
    @endif
@endsection

@section('scripts')
    <script>
        function toggleCommentForm(postId) {
            const form = document.getElementById(`comment-form-${postId}`);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
@endsection
