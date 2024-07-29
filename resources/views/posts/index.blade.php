<x-app-layout title="All Posts">

    @if (session('status'))
        <div class="alert alert-success w-75 m-auto mt-3 fw-bold">{{ session('status') }}</div>
    @endif

    <table class="table w-75 m-auto mt-3 w-fit p-2">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Posted By</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="{{ route('posts.show', [$post->id, 'posts.index']) }}"
                            class="btn btn-primary fw-bold">Read</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="text-danger">
                            No Posts Yet!
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $posts->links() }}

</x-app-layout>